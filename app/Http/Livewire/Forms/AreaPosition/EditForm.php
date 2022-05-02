<?php

namespace App\Http\Livewire\Forms\AreaPosition;

use App\Models\AreaPosition;
use App\Traits\Livewire\AlertifyTrait;
use App\Traits\Livewire\ModalFormTrait;
use Livewire\Component;

class EditForm extends Component
{
    use AlertifyTrait;
    use ModalFormTrait;

    public $name;
    public $code;
    public $vehicle_type;
    public $address;
    public $address_name;
    public $formData = [];

    protected $listeners = ['formData'];

    public function formData($data)
    {
        $this->formData = $data;
        $this->name = $data['name'];
        $this->code = $data['code'];
        $this->vehicle_type = $data['vehicle_type'];
        $this->address = $data['address'];
        $this->address_name = $data['address_name'];
    }


    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function submit()
    {
        $this->validate();

        $payload = [
            'name' => $this->name,
            'code' => $this->code,
            'vehicle_type' => $this->vehicle_type,
            'address' => $this->address,
            'address_name' => $this->address_name,
        ];

        try {
            AreaPosition::where('id', '=', $this->formData['id'])->update($payload);
            $this->closeAndRefreshModal();
        } catch (\Exception $exception) {
            $this->alertify('error', $exception->getMessage());
        }
    }

    public function render()
    {
        $this->errorAlert();
        return view('livewire.forms.area-position.edit-form');
    }
}
