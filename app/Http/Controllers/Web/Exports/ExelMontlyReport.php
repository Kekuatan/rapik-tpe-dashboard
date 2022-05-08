<?php

namespace App\Http\Controllers\Web\Exports;

use App\Enum\TicketEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\MontlyReport;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Traits\Ticket\TicketQueryTrait;

class ExelMontlyReport extends Controller
{
    use TicketQueryTrait;
    public function excel(){

        return Excel::download(new MontlyReport(), 'users.xlsx');
    }
    public function export()
    {
        $startDate = '2021-09-07';
        $endDate = Carbon::now()->format('Y-m-d');
        $data = $this->querySumAndGroupBy(['terminal_id','jenis_kend','bank'], [$startDate,$endDate]);
        $data  = collect($data)->groupBy('terminal_id');
        $formatData = [];
        foreach (collect($data) as $key => $item){
            $formatData[] = [
                'location' => $key,
                'qty_mobil' => collect($data[$key])->where('jenis_kend', '==', TicketEnum::VEHICLES['A'])->sum('total_record'),
                'qty_motor' => collect($data[$key])->where('jenis_kend', '==', TicketEnum::VEHICLES['C'])->sum('total_record'),
                'qty_truck' => collect($data[$key])->where('jenis_kend', '==', TicketEnum::VEHICLES['B'])->sum('total_record'),
                'qty_emoney' => collect($data[$key])->where('bank', '==', TicketEnum::BANKS['0'])->sum('total_record'),
                'qty_tapcash' => collect($data[$key])->where('bank', '==', TicketEnum::BANKS['3'])->sum('total_record'),
                'qty_qrcode' => collect($data[$key])->where('bank', '==', TicketEnum::BANKS['q'])->sum('total_record'),
                'total_amount' => collect($data[$key])->sum('total_amount'),
            ];
        }
//        return response()->json($formatData);
//        $html = view($htmlView, $payload)->render();
        return view('converts.exel.report', ['data' => $formatData]);

    }
}
