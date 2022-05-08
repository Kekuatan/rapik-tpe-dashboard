<?php

namespace App\Traits\Livewire;

trait AlertifyTrait
{
    public function alertify($type, $message){
        $this->dispatchBrowserEvent('alert-' . $type, ['message' => $message]);
    }

    public function errorAlert(){
        if (count($this->getErrorBag()->all())) {
            foreach ($this->getErrorBag()->all() as $error) {
                $this->alertify('error', $error);
            }
        }
        $this->resetErrorBag();
    }
}
