<?php

namespace App\Http\Livewire\Components\Tables;

use App\Traits\Ticket\TicketQueryTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;

class DataTransaction extends Component
{
    use TicketQueryTrait;
    protected $listeners = ['dataTable'];

    public function dataTable($data){
        $this->startDate = $data['startDate'];
        $this->endDate = $data['endDate'];
        $this->location = $data['location'] ?? 'all';
        $this->vehicle = $data['vehicle'] ?? 'all';
        $this->bank = $data['bank'] ?? 'all';
        $this->resetPage();
        $this->render();
    }

    public function mount(){
        $this->resetPage();
        $this->startDate = Carbon::now()->format('Y-m-d');
        $this->endDate = Carbon::now()->format('Y-m-d');

    }

    public function render()
    {

        $tableData = $this->getData();
        $count = collect($tableData)->count();
        return view('livewire.components.tables.data-transaction',[
            'tickets' => $tableData,
            'showingPage' => blank($tableData) ? 0 : $tableData->perPage() * $tableData->currentPage(),
            'totalPage' => $count,
            'sumTotalRecord' => $this->getDataCount(),
            'sumTotalAmount' => collect($tableData)->sum('amount'),
        ]);
    }
}
