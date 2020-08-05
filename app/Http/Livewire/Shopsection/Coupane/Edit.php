<?php

namespace App\Http\Livewire\Shopsection\Coupane;

use App\Admin\Coupane;
use Livewire\Component;

class Edit extends Component
{
    public $coupane;

    public $name, $code, $total, $discount;
    public function mount($coupane)
    {
        $this->coupane = $coupane;
        $this->name = $coupane->name;
        $this->code = $coupane->code;
        $this->total = $coupane->total;
        $this->discount = $coupane->discount;
    }
    public function render()
    {
        return view('livewire.shopsection.coupane.edit');
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
            'code' => 'required',
            'total' => 'required|numeric',
            'discount' => 'required|numeric',
        ]);

        $this->coupane->update([
            'name' => $this->name,
            'code' => $this->code,
            'total' => $this->total,
            'discount' => $this->discount,
        ]);
        $this->emit('backToEditCoupane');
    }
}
