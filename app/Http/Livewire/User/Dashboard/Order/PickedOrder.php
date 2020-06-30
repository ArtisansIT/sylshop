<?php

namespace App\Http\Livewire\User\Dashboard\Order;

use App\Admin\Order;
use Livewire\Component;

class PickedOrder extends Component
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
                ['delivered', false],
            ])->latest()
            ->get();
    }
    public function render()
    {
        return view('livewire.user.dashboard.order.picked-order');
    }

    public function showDelails($order)
    {
        $component = 'PickedOrder';
        $this->emit('showDelailsOrderStatusFalse', $order, $component);
    }
}
