<?php

namespace App\Http\Livewire\Pages;

use App\Enum\TicketEnum;
use App\Exports\MontlyReport;
use App\Traits\Livewire\AlertifyTrait;
use App\Traits\Ticket\TicketQueryTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class DetailReportTransaction extends Component
{
    use TicketQueryTrait;
    use AlertifyTrait;
    public $input =[];
    public $responseData = [];


    public function getReportData(){
        $where = $this->setWhere();
        if ($this->startDate){
            return $this->getReportDetail([$this->startDate,$this->endDate], $where);
        } else {
            return [];
        }
    }

    protected $rules = [
        'input.startDate' => 'required|date|before_or_equal:now|before_or_equal:input.endDate',
        'input.endDate' => 'required|date|before_or_equal:now|after_or_equal:input.tartDate',
    ];

    public function mount(){
        $this->startDate = null;
        $this->endDate = null;
        $this->startDate = $this->input['startDate']??'';
        $this->endDate = $this->input['endDate']??'';
        $this->location = $this->input['location'] ?? 'all';
        $this->vehicle = $this->input['vehicle'] ?? 'all';
        $this->bank = $this->input['bank'] ?? 'all';
}
    public function changeQuery()
    {

        $this->validate();
        $this->startDate = $this->input['startDate']??'';
        $this->endDate = $this->input['endDate']??'';
        $this->location = $this->input['location'] ?? 'all';
        $this->vehicle = $this->input['vehicle'] ?? 'all';
        $this->bank = $this->input['bank'] ?? 'all';

        $this->render();
    }

    public function getResponseData() {
        return  [
            'locations' => TicketEnum::LOCATIONS,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'vehicles' => TicketEnum::VEHICLES,
            'banks' => TicketEnum::BANKS,
            'data' => $this->getReportData(),
            'title' => 'LAPORAN TRANSAKSI DETAIL TPE',
            'currentData' => Carbon::now()->format('d-m-Y'),
            'locationName' => TicketEnum::getLocationName($this->location),
            'terminalIdName' => TicketEnum::getLocationName($this->location),
            'vehicleName'  => TicketEnum::getVehicleName($this->vehicle),
            'bankName' => TicketEnum::getBankName($this->bank),
            'userName' => \Auth::user()->email
        ];
    }
    public function excel()
    {
        return Excel::download(new \App\Exports\DetailReportTransaction($this->getResponseData()), 'users.xlsx');
    }

    public function render()
    {
        $this->errorAlert();
        return view('livewire.pages.detail-report-transaction', $this->getResponseData());
    }
}
