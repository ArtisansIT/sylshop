<?php

namespace App\Http\Livewire\Front\Pages\Dashboard;

use App\Admin\Order;
use Livewire\Component;

class PickedOrder extends Component
{

    public $orders;

    public function mount()
    {

        $this->orders = Order::with('details')
            ->where('picked', true)
            ->get();
    }
    public function render()
    {
        return view('livewire.front.pages.dashboard.picked-order');
    }

    public function showDelails($order)
    {
        $component = 'PickedOrder';
        $this->emit('showDelailsOrderStatusFalse', $order, $component);
    }
}
