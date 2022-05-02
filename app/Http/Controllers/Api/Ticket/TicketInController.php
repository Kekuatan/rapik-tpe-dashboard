<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Http\Controllers\Controller;
use App\Models\AreaPosition;
use App\Models\Ticket;
use App\Services\Member\MemberService;
use App\Services\Ticket\TicketService;
use Illuminate\Http\Request;

class TicketInController extends Controller
{
    public function __invoke(Request $request, TicketService $ticketService, MemberService $memberService){

        $validation = [
            'area_position_in_id' => 'required|string|exists:area_positions,id',
            'member_card_no' => 'nullable|string', //'member_id' => 'nullable|string',
        ];

        $request->validate($validation);
        $payload = $request->only(['area_position_in_id']);

        if ($request->has('member_card_no')){
            $member = $memberService->getMemberByCardNumber($request->member_card_no);
            try {
                 $memberService->checkMemberStayOrNot($member);
            } catch (\Exception $e){
                return response()->json(['message' => $e->getMessage()], 422);
            }
        }

        $areaPosition = AreaPosition::where('id', '=', 1)->first();

        $payload['barcode_no']  = $ticketService->barcodeNumber($areaPosition);
        $payload['start_at']  = $ticketService->getDateTime();
        $payload['picture_vehicle_in']  = asset('images/vehicles/'. $payload['barcode_no']. '-in.png');
        $request->validate($validation);

        $ticket = Ticket::create($payload);

        return response()->json($ticket);

    }
}
