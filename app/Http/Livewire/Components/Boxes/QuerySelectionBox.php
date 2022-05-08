<?php

namespace App\Http\Livewire\Components\Boxes;

use App\Enum\TicketEnum;
use App\Traits\Livewire\AlertifyTrait;
use App\Traits\Ticket\TicketQueryTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;

class QuerySelectionBox extends Component
{

    use TicketQueryTrait;
    use AlertifyTrait;

    public $data = null;
    public $input = [];
    public $periode = null;
    protected $listeners = ['dataBox'];

    protected $rules = [
        'startDate' => 'required',
        'endDate' => 'required',
    ];

    public function dataBox($data = [])
    {
        $this->input = $data;
        $this->startDate = $data['startDate'] ?? '';
        $this->endDate = $data['endDate'] ?? '';
        $this->location = $data['location'] ?? 'all';
        $this->vehicle = $data['vehicle'] ?? 'all';
        $this->bank = $data['bank'] ?? 'all';
    }

    public function mount()
    {
        if ($this->periode == 'today') {
            $this->startDate = Carbon::now()->format('Y-m-d');
            $this->endDate = Carbon::now()->format('Y-m-d');
            $this->input['startDate'] = $this->startDate;
            $this->input['endDate'] = $this->endDate;
        }
//        $this->startDate = Carbon::now()->firstOfMonth()->format('Y-m-d');
//        $this->endDate = Carbon::now()->format('Y-m-d');
    }

    public function changeQuery()
    {
        $this->dataBox($this->input);
//        dd($this->input);
        $this->validate();

        $this->emit('changeQuery', $this->input);
    }

    public function changePeriode($periode)
    {
        $this->periode = $periode;
        if ($periode == 'month') {
            $this->startDate = Carbon::now()->firstOfMonth()->format('Y-m-d');
        } elseif ($periode == 'quarter') {
            $this->startDate = Carbon::now()->firstOfQuarter()->format('Y-m-d');
        } elseif ($periode == 'year') {
            $this->startDate = Carbon::now()->firstOfYear()->firstOfMonth()->format('Y-m-d');
        } else {
            $this->startDate = Carbon::now()->format('Y-m-d');
        }
    }

    public function render()
    {
        $this->errorAlert();
        return view('livewire.components.boxes.query-selection-box', [
            'locations' => TicketEnum::LOCATIONS,
            'vehicles' => TicketEnum::VEHICLES,
            'banks' => TicketEnum::BANKS,]);
    }
}
