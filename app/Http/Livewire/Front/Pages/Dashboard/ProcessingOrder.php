<?php

namespace App\Http\Livewire\Front\Pages\Dashboard;

use App\Admin\Order;
use Livewire\Component;

class ProcessingOrder extends Component
{

    public $orders;

    public function mount()
    {

        $this->orders = Order::with('details')
            ->where('processing', true)
            ->get();
    }
    public function render()
    {
        return view('livewire.front.pages.dashboard.processing-order');
    }

    public function showDelails($order)
    {
        $component = 'ProcessingOrder';
        $this->emit('showDelailsOrderStatusFalse', $order, $component);
    }
}
