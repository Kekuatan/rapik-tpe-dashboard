<?php

namespace App\Http\Livewire\Components\Tables;

use App\Traits\Ticket\TicketQueryTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;

class YearlyReportTransaction extends Component
{
    use TicketQueryTrait;
    public $dataTable = [];
    protected $listeners = ['dataTable'];

    public function dataTable($data){
        $this->startDate = $data['startDate'];
        $this->endDate = $data['endDate'];
        $this->location = $data['location'] ?? 'all';
        $this->vehicle = $data['vehicle'] ?? 'all';
        $this->bank = $data['bank'] ?? 'all';
    }
    public function mount(){
        $this->startDate = Carbon::now()->firstOfYear()->format('Y-m-d');
        $this->endDate = Carbon::now()->lastOfMonth()->format('Y-m-d');
    }

    public function render()
    {
        $where =$this->setWhere();
        return view('livewire.components.tables.yearly-report-transaction',
            ['reportTicketPerYear'=>$this->queryReportTicketPerYear([$this->startDate, $this->endDate], $where)]);
    }
}
