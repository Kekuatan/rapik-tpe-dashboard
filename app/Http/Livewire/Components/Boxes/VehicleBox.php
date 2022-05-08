<?php

namespace App\Http\Livewire\Components\Boxes;

use App\Traits\Ticket\TicketQueryTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;

class VehicleBox extends Component
{
    use TicketQueryTrait;
    public $data = null;
    public $periode = 'month';
    protected $listeners = ['dataBox'];

    public function dataBox($data){
        $this->startDate = $data['startDate'];
        $this->endDate = $data['endDate'];
        $this->location = $data['location'] ?? 'all';
        $this->vehicle = $data['vehicle'] ?? 'all';
        $this->bank = $data['bank'] ?? 'all';
    }

    public function mount(){
        $this->startDate = Carbon::now()->firstOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->format('Y-m-d');
    }

    public function changePeriode($periode){
        $this->periode = $periode;
        if ($periode == 'month'){
            $this->startDate = Carbon::now()->firstOfMonth()->format('Y-m-d');
        }elseif ($periode == 'quarter'){
            $this->startDate = Carbon::now()->firstOfQuarter()->format('Y-m-d');
        }elseif ($periode == 'year'){
            $this->startDate = Carbon::now()->firstOfYear()->firstOfMonth()->format('Y-m-d');
        } else {
            $this->startDate = Carbon::now()->format('Y-m-d');
        }

    }

    public function render()
    {
        $where = $this->setWhere();
        $reportVehicle = $this->querySumAndGroupBy(['jenis_kend'], [$this->startDate, $this->endDate], $where);

        return view('livewire.components.boxes.vehicle-box',[
            'reportVehicle' => $reportVehicle,
            'sumTotalRecord' => collect($reportVehicle)->sum('total_record'),
        ]);
    }
}
