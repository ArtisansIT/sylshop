<?php

namespace App\Http\Livewire\Admin\Coupane;

use App\Admin\Category as AdminCategory;
use App\Admin\Coupane;
use Livewire\Component;

class Category extends Component
{
    public $form = [
        'name' => '',
        'category_id' => '',
        'code' => '',
        'total' => '',
        'discount' => '',

    ];

    public $categorys;

    public function mount()
    {
        $this->categorys = AdminCategory::all();
    }
    public function render()
    {
        return view('livewire.admin.coupane.category');
    }

    public function submitForm()
    {
        $this->validate([
            'form.name' => 'required',
            'form.category_id' => 'required',
            'form.code' => 'required',
            'form.total' => 'required|numeric',
            'form.discount' => 'required|numeric',
        ]);

        Coupane::create($this->form);
        $this->emit('coupaneCreate');
    }
}
