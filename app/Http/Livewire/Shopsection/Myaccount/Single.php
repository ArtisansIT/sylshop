<?php

namespace App\Http\Livewire\Shopsection\Myaccount;

use Livewire\Component;

class Single extends Component
{
    public $order_details;
    public function render()
    {
        return view('livewire.shopsection.myaccount.single');
    }

    public function mount($order_details)
    {
        $this->order_details = $order_details->load(
            'product:id,code',
            'variation:id,name',
            'order:id,code'
        );
        // dd($this->order_details);
    }
}
