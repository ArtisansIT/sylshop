<?php

namespace App\Http\Livewire\User\Dashboard\Order;

use App\Admin\Order;
use Livewire\Component;

class DeliveredOder extends Component
{

    public $orders;

    public function mount()
    {

        $this->orders = Order::with('details')
            ->where([

                ['pending', true],
                ['confirmed', true],
                ['processing', true],
                ['picked', true],
                ['delivered', true],
            ])->latest()
            ->get();
    }
    public function render()
    {
        return view('livewire.user.dashboard.order.delivered-oder');
    }

    public function showDelails($order)
    {
        $component = 'DeliveredOder';
        $this->emit('showDelailsOrderStatusFalse', $order, $component);
    }
}
