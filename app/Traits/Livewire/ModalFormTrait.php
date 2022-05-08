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

}
