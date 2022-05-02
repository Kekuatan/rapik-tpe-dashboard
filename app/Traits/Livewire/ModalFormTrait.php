<?php

namespace App\Traits\Livewire;

trait ModalFormTrait
{
    public function closeAndRefreshModal()
    {
        $this->alertify('success', 'Success');
        $this->emitTo('components.modal-component', 'closeModal');
        $this->emitTo('pages.area-position', 'refresh-component');
    }

    public function errorAlert(){
        if (count($this->getErrorBag()->all())) {
            foreach ($this->getErrorBag()->all() as $error) {
                $this->alertify('error', $error);
            }
        }
    }
}
