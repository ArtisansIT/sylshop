<?php

namespace App\Http\Livewire\User\Dashboard\Order;

use App\Admin\Order;
use Livewire\Component;

class Pending extends Component
{
    public $orders;

    public function mount()
    {

        $this->orders = Order::with('details')
            ->where([
                ['pending', true],
                ['confirmed', false],
                ['processing', false],
                ['picked', false],
                ['delivered', false],
            ])->latest()
            ->get();
    }
    public function render()
    {
        return view('livewire.user.dashboard.order.pending');
    }

    public function showDelails($order)
    {
        $component = 'Pending';
        $this->emit('showDelailsOrderStatusFalse', $order, $component);
    }
}
