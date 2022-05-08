<?php

namespace App\Http\Livewire\Components\Report\Excel;

use App\Enum\TicketEnum;
use App\Exports\MontlyReport;
use App\Traits\Ticket\TicketQueryTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ReportDefault extends Component
{

    use TicketQueryTrait;

    public $formatData = [];

    public function mount()
    {
        $this->getData();
    }

    public function excel()
    {
        return Excel::download(new MontlyReport($this->formatData), 'users.xlsx');
    }

    public function getData()
    {
        $startDate = '2021-09-07';
        $endDate = Carbon::now()->format('Y-m-d');
        $data = $this->querySumAndGroupBy(['terminal_id', 'jenis_kend', 'bank'], [$startDate, $endDate]);
        $data = collect($data)->groupBy('terminal_id');
        $formatData = [];
        foreach (collect($data) as $key => $item) {
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
        $this->formatData = $formatData;
    }

    public function render()
    {


        return view('livewire.components.report.excel.report-default', ['data' => $this->formatData])->layout('layouts.app');
    }
}
