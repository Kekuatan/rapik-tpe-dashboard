<?php

namespace App\Traits\Livewire;

trait AlertifyTrait
{
    public function alertify($type, $message){
        $this->dispatchBrowserEvent('alert-' . $type, ['message' => $message]);
    }
}
