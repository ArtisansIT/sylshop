<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;

class SingleOrder extends Component
{

    public $singleOrder;
    public function mount($singleOrder)
    {
        $this->singleOrder = $singleOrder;
    }
    public function render()
    {
        return view('livewire.admin.order.single-order');
    }

    public function backToPage()
    {
        $this->emit('back');
    }
}
