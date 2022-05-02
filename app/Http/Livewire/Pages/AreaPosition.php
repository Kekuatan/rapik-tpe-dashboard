<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Livewire\WithPagination;

class AreaPosition extends Component
{
    use WithPagination;

    public $tableData = null;

    public $listeners = ['refresh-component' => '$refresh'];

    public function openModal($form, $data=[])
    {
        $this->emitTo('components.modal-component', 'openModal', $form, $data);
    }

    public function closeModal($form)
    {
        $this->emitTo('components.modal-component', 'closeModal');
    }

    public static function  getData()
    {
        return \App\Models\AreaPosition::orderBy('created_at','DESC')->simplePaginate(3);
    }


    public function render()
    {

        //dd($tableData->c());
        $tableData = $this->getData();
        return view('livewire.pages.area-position',
            [
                'areaPositions' =>$tableData,
                'showingPage' =>$tableData->perPage() * $tableData->currentPage(),
                'totalPage' =>\App\Models\AreaPosition::count(),
            ]);
    }


}
