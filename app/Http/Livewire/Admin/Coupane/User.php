<?php

namespace App\Http\Livewire\Admin\Coupane;

use App\Admin\Coupane;
use Livewire\Component;

class User extends Component
{

    public $form = [
        'name' => '',
        'code' => '',
        'total' => '',
        'coin' => '',
        'discount' => '',

    ];
    public function render()
    {
        return view('livewire.admin.coupane.user');
    }

    public function submitForm()
    {
        $this->validate([
            'form.name' => 'required',
            'form.code' => 'required',
            'form.total' => 'required|numeric',
            'form.coin' => 'required|numeric',
            'form.discount' => 'required|numeric',
        ]);

        Coupane::create($this->form);
        $this->emit('coupaneCreate');
    }
}
