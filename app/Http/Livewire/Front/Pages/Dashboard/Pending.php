<?php

namespace App\Http\Livewire\Front\Pages\Dashboard;

use App\Admin\Order;
use Livewire\Component;

class Pending extends Component
{

    public $orders;

    public function mount()
    {

        $this->orders = Order::with('details')
            ->where('pending', true)
            ->get();
    }
    public function render()
    {
        return view('livewire.front.pages.dashboard.pending');
    }

    public function showDelails($order)
    {
        $component = 'Pending';
        $this->emit('showDelailsOrderStatusFalse', $order, $component);
    }
}
