<?php

namespace App\Http\Livewire\Forms\AreaPosition;

use App\Models\AreaPosition;
use App\Traits\Livewire\AlertifyTrait;
use Livewire\Component;

class DeleteForm extends Component
{
    use AlertifyTrait;

    public $formData;
    protected $listeners = ['formData'];

    public function formData($data)
    {
        $this->formData = $data;
    }

    public function submit()
    {

        try {
            AreaPosition::where('id', '=', $this->formData['id'])->first()->delete();
            $this->closeAndRefreshModal();
        } catch (\Exception $exception) {
            $this->alertify('error', $exception->getMessage());
        }
    }


    public function render()
    {
        $this->errorAlert();
        return view('livewire.forms.area-position.delete-form');
    }
}
