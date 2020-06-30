<?php

namespace App\Http\Livewire\Admin\Order;

use App\Admin\Order;
use Livewire\Component;

class Delevered extends Component
{

    public $deleveredOrders;
    public function render()
    {
        return view('livewire.admin.order.delevered');
    }

    public function mount()
    {
        $this->deleveredOrders =
            Order::where([

                ['pending', true],
                ['confirmed', true],
                ['processing', true],
                ['picked', true],
                ['delivered', true],
            ])->latest()->get();
    }
}
