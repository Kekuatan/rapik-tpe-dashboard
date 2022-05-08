<?php

namespace App\Http\Livewire\Pages;

use App\Traits\Ticket\TicketQueryTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Transaction extends Component
{
    use WithPagination;
    use TicketQueryTrait;
//    public $input = [];
//    protected $listeners = ['changeQuery'];
//
//    public function changeQuery(){
//
//    }
//    public function mount()
//    {
//        $this->startDate = '2021-09-07';
//        $this->vehicle = 'all';
//        $this->bank = 'all';
//        $this->location = 'all';
//        $this->endDate = Carbon::now()->format('Y-m-d');
//        $this->input['startDate'] = $this->startDate;
//        $this->input['endDate'] = Carbon::now()->format('Y-m-d');
//    }
//
//    public function dehydrate()
//    {
//        $this->emitTo('components.boxes.vehicle-box', 'dataBox', $this->input);
//        $this->emitTo('components.tables.monthly-report-transaction', 'dataTable', $this->input);
//        $this->emitTo('components.tables.daily-report-transaction', 'dataTable', $this->input);
//        $this->emitTo('components.tables.yearly-report-transaction', 'dataTable', $this->input);
//
//        $this->emitTo('components.tables.data-transaction', 'dataTable', $this->input);
//    }
    public $input = [];
    public $sumTotalRecord = 0;
    protected $listeners = ['changeQuery'];




    public function mount()
    {
        $this->startDate = '2021-09-07';
        $this->vehicle = 'all';
        $this->bank = 'all';
        $this->location = 'all';
        $this->endDate = Carbon::now()->format('Y-m-d');
        $this->input['startDate'] = $this->startDate;
        $this->input['endDate'] = Carbon::now()->format('Y-m-d');
    }



    public function changeQuery($input)
    {


        $this->input = $input;
        $this->startDate = $this->input['startDate']??'';
        $this->endDate = $this->input['endDate']??'';
        $this->location = $this->input['location'] ?? 'all';
        $this->vehicle = $this->input['vehicle'] ?? 'all';
        $this->bank = $this->input['bank'] ?? 'all';
        $this->emitTo('components.tables.data-transaction', 'dataTable', $this->input);

    }

    public function dehydrate()
    {
        $this->emitTo('components.boxes.query-selection-box', 'dataBox', $this->input);
        $this->emitTo('components.tables.data-transaction', 'dataTable', $this->input);

    }

    public function render()
    {
        return view('livewire.pages.transaction');
    }
}
