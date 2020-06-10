<?php

namespace App\Http\Livewire\Front\Pages\Dashboard;

use App\Admin\Order;
use Livewire\Component;

class ConfirmeOrder extends Component
{

    public $orders;

    public function mount()
    {

        $this->orders = Order::with('details')
            ->where('confirmed', true)
            ->get();
    }
    public function render()
    {
        return view('livewire.front.pages.dashboard.confirme-order');
    }

    public function showDelails($order)
    {
        $component = 'ConfirmeOrder';
        $this->emit('showDelailsOrderStatusFalse', $order, $component);
    }
}
