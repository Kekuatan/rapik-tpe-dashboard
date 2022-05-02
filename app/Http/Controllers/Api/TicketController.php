<?php

namespace App\Http\Controllers\Api;

use App\Enum\ValidationEnum;
use App\Http\Controllers\Controller;
use App\Models\AreaPosition;
use App\Models\Ticket;
use App\Services\Member\MemberService;
use App\Services\Ticket\TicketService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TicketController extends Controller
{
    public function index(){}
    public function store(Request $request, TicketService $ticketService, MemberService $memberService)
    {


//        return response()->json(['message' => $barcodeNo, 's' => $barcodeNo2]);

        $validation = [
            //'total_price' => 'nullable|min:0|number',
            //'vehicle_id' => 'nullable|string',
            'area_position_in_id' => 'required|string|exists:area_positions,id',
            //'area_position_out_id' => 'nullable|string',
            //'barcode_no' => 'required|string',
            //'picture_vehicle_in' => 'required|string',
            //'picture_vehicle_out' => 'nullable|string',
            //'user_id' => 'nullable|string',
            //'plat_no' => 'required|string',
            'member_card_no' => 'nullable|string', //'member_id' => 'nullable|string',
            //'start_at' => 'required|date_format:d/m/Y H:i:s',
            //'end_at' => 'nullable|date_format:d/m/Y H:i:s',
            //'voucher_id' => 'nullable|string',
            //'payment_method_id' => 'nullable|string',
            //'bypasser_id' => 'nullable|string',
        ];

        $request->validate($validation);
        $payload = $request->only(['area_position_in_id']);

        if ($request->has('member_card_no')){
            $member = $memberService->getMemberByCardNumber($request->member_card_no);
            if ( !blank($member)){
                $payload['member_id'] = $member->Id;
                $payload['vehicle_id'] = $member->Id;
            } else {
                return response()->json(['message' => 'Error member not found'], 422);
            }
        }

        $areaPosition = AreaPosition::where('id', '=', $request->area_position_in_id)->first();

        $payload['barcode_no']  = $ticketService->barcodeNumber($areaPosition);
        $payload['start_at']  = $ticketService->getDateTime();
        $payload['picture_vehicle_in']  = asset('images/vehicles/'. $payload['barcode_no']. '-in.png');

        $request->validate($validation);
        $ticket = Ticket::create($payload);

        return response()->json($ticket);

    }

    public function update($id, Request $request){

    }
}
