<?php

namespace App\Http\Livewire\User\Dashboard\Order;

use App\Admin\Order;
use Livewire\Component;

class ConfirmeOrder extends Component
{

    public $orders;

    public function mount()
    {

        $this->orders = Order::with('details')
            ->where([
                ['pending', true],
                ['confirmed', true],
                ['processing', false],
                ['picked', false],
                ['delivered', false],
            ])->latest()
            ->get();
    }
    public function render()
    {
        return view('livewire.user.dashboard.order.confirme-order');
    }

    public function showDelails($order)
    {
        $component = 'ConfirmeOrder';
        $this->emit('showDelailsOrderStatusFalse', $order, $component);
    }
}
