<?php

namespace App\Http\Livewire\Admin\Coupane\User;

use App\Admin\Coupane;
use Livewire\Component;

class Edit extends Component
{
    public $name, $code, $total, $discount, $coin, $record;

    public function render()
    {
        return view('livewire.admin.coupane.user.edit');
    }

    public function mount($coupane_id)
    {
        $this->record = Coupane::findOrFail($coupane_id);
        $this->name = $this->record->name;
        $this->code = $this->record->code;
        $this->total = $this->record->total;
        $this->discount = $this->record->discount;
        $this->coin = $this->record->coin;
    }

    public function submitForm()
    {
        $this->validate([

            'name' => 'required',
            'code' => 'required',
            'total' => 'required',
            'discount' => 'required',
            'coin' => 'required',
        ]);

        $this->record->update([

            'name' => $this->name,
            'code' => $this->code,
            'total' => $this->total,
            'discount' => $this->discount,
            'coin' => $this->discount,
        ]);

        $this->emit('backToUserCoupane');
    }
}
