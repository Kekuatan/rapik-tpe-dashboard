<?php

namespace App\Http\Livewire\Pages;

use App\Traits\Ticket\TicketQueryTrait;
use Livewire\Component;

class Report extends Component
{
    use TicketQueryTrait;
    public $input = [];

    public function changeQuery($input){
        $this->input = $input;
    }

    public function render()
    {
        return view('livewire.pages.report');
    }
}
