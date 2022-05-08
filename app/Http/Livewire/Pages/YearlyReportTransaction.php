<?php

namespace App\Http\Livewire\Pages;

use App\Enum\TicketEnum;
use App\Traits\Livewire\AlertifyTrait;
use App\Traits\Ticket\TicketQueryTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class YearlyReportTransaction extends Component
{
    use TicketQueryTrait;
    use AlertifyTrait;

    public $input = [];
    public $responseData = [];


    public function getReportData()
    {
        $where = $this->setWhere();
        if ($this->startDate) {
            $dataReport = $this->queryReportTicketPerYearEachMonth([$this->startDate, $this->endDate], $where);
//        return $dataReport;
            $data = collect($dataReport)->groupBy('terminal_id')->sortBy('date');
            $formatData = [];
            $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
//            $endMonth = Carbon::parseFromLocale($this->startDate)->lastOfMonth()->format('m');
            $formatMonth = Carbon::parseFromLocale($this->startDate)->lastOfMonth()->format('m-Y');
            $stoper = false;
            foreach ($months as $month) {
                if (!$stoper) {
                    foreach (collect($data) as $key => $item) {
                        $formatData[] = [
                            'terminal_id' => $key,
                            'location' => $key,
                            'month' => Carbon::parseFromLocale($this->startDate)->lastOfMonth()->format('F-Y'),
                            'qty_mobil' => collect($data[$key])->where('month', '==', $month)->where('jenis_kend', '==', TicketEnum::VEHICLES['A'])->sum('total_record'),
                            'qty_motor' => collect($data[$key])->where('month', '==', $month)->where('jenis_kend', '==', TicketEnum::VEHICLES['C'])->sum('total_record'),
                            'qty_truck' => collect($data[$key])->where('month', '==', $month)->where('jenis_kend', '==', TicketEnum::VEHICLES['B'])->sum('total_record'),

//                                'qty_mobil' => collect($data[$key])->where('date', '==', $day)->where('jenis_kend', '==', 'A')->sum('total_record'),
//                                'qty_motor' => collect($data[$key])->where('date', '==', $day)->where('jenis_kend', '==', 'C')->sum('total_record'),
//                                'qty_truck' => collect($data[$key])->where('date', '==', $day)->where('jenis_kend', '==', 'B')->sum('total_record'),
                            'total_amount' => collect($data[$key])->where('month', '==', $month)->sum('total_amount'),
                            'total_record' => collect($data[$key])->where('month', '==', $month)->sum('total_record'),
                        ];
                    }
                }
            }
            return $formatData;

        } else {
            return [];
        }
    }

    protected $rules = [
        'input.startDate' => 'required|date|before_or_equal:now|before_or_equal:input.endDate',
        'input.endDate' => 'required|date|before_or_equal:now|after_or_equal:input.tartDate',
    ];

    public function mount()
    {
        $this->startDate = null;
        $this->endDate = null;
        $this->startDate = $this->input['startDate'] ?? '';
        $this->endDate = $this->input['endDate'] ?? '';
        $this->location = $this->input['location'] ?? 'all';
        $this->vehicle = $this->input['vehicle'] ?? 'all';
        $this->bank = $this->input['bank'] ?? 'all';
    }

    public function changeQuery()
    {

//        $this->validate();
        $this->startDate = $this->input['year'] ? $this->input['year'] . '-01-01' : '';
        $this->endDate = $this->input['year'] ? Carbon::parseFromLocale($this->input['year'] . '-01-01')->lastOfYear()->format('Y-m-d') : '';
        $this->location = $this->input['location'] ?? 'all';
        $this->vehicle = $this->input['vehicle'] ?? 'all';
        $this->bank = $this->input['bank'] ?? 'all';
        $this->render();
    }

    public function getResponseData()
    {

        return [
            'locations' => TicketEnum::LOCATIONS,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'vehicles' => TicketEnum::VEHICLES,
            'banks' => TicketEnum::BANKS,
            'data' => collect($this->getReportData())->groupBy('terminal_id'),
            'totalSumRecord' => collect($this->getReportData())->sum('total_record'),
            'totalSumAmount' => collect($this->getReportData())->sum('total_amount'),
            'title' => 'LAPORAN TRANSAKSI TAHUNAN TPE',
            'currentData' => Carbon::now()->format('d-m-Y'),
            'locationName' => TicketEnum::getLocationName($this->location),
            'terminalIdName' => TicketEnum::getLocationName($this->location),
            'vehicleName' => TicketEnum::getVehicleName($this->vehicle),
            'bankName' => TicketEnum::getBankName($this->bank),
            'userName' => \Auth::user()->email
        ];
    }

    public function excel()
    {
        return Excel::download(new \App\Exports\YearlyReportTransaction($this->getResponseData()), 'users.xlsx');
    }
    public function render()
    {
        return view('livewire.pages.yearly-report-transaction',$this->getResponseData());
    }
}
