<?php

namespace App\Http\Livewire\Forms\AreaPosition;

use App\Models\AreaPosition;
use App\Traits\Livewire\AlertifyTrait;
use App\Traits\Livewire\ModalFormTrait;
use Livewire\Component;

class CreateForm extends Component
{
    use AlertifyTrait;
    use ModalFormTrait;

    public $name;
    public $code;
    public $vehicle_type;
    public $address;
    public $address_name;

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
            AreaPosition::create($payload);
            $this->closeAndRefreshModal();
        } catch (\Exception $exception) {
            $this->alertify('error', $exception->getMessage());
        }

    }

    public function render()
    {
        $this->errorAlert();
        return view('livewire.forms.area-position.create-form');
    }
}
