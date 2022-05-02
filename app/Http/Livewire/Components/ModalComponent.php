<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ModalComponent extends Component
{

    public $modalStatus = false;

//    public $form = 'forms.area-position.create-form';
    public $form = 'forms.default-form';

    protected $listeners = ['openModal', 'closeModal'];

    public function mount(){
         $this->form = 'forms.default-form';
    }

    public function getForm(){
        return $this->form;
    }
    public function openModal($form, $data)
    {

        if ($form == 'forms.area-position.edit-form'){
            $this->emitTo($form,'formData',$data);
        }
        if ($form == 'forms.area-position.delete-form'){
            $this->emitTo($form,'formData',$data);
        }


        $this->form = $form;
        $this->modalStatus = true;
    }

    public function closeModal()
    {
        $this->form = 'forms.default-form';
        $this->modalStatus = false;
    }

//    public function mount($form){
//        $this->form = $form;
//    }

    public function render()
    {
        return view('livewire.components.modal-component',['test' => blank($this->form) ? $this->form : 'forms.default-form']);
    }
}
