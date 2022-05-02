<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class DefaultForm extends Component
{

    public $form = '';

    public function render()
    {
        return view('livewire.forms.default-form');
    }
}
