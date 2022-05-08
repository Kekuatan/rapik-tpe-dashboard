<?php

namespace App\Http\Livewire\Pages\Workers\Field;

use App\Models\Ticket;
use Carbon\Carbon;
use Livewire\Component;

class Home extends Component
{

    public $platNo = null;
    public function submit(){
        $this->render();
    }

    public function render()
    {
        $data = Ticket::where('nopol', '=', $this->platNo)
//            ->where('exit_date', '>=', Carbon::now())
            ->get();
        return view('livewire.pages.workers.field.home', ['data' => $data]);
    }
}
