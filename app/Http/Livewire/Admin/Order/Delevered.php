<?php

namespace App\Http\Livewire\Admin\Order;

use App\Admin\Order;
use Livewire\Component;

class Delevered extends Component
{

    public $deleveredOrders;
    public $search;


    public function mount()
    {
        $this->deleveredOrders = $this->search === null ?
            Order::where([

                ['pending', true],
                ['confirmed', true],
                ['processing', true],
                ['picked', true],
                ['delivered', true],
            ])->latest()->get() :

            Order::where([
                ['code', 'like', '%' . $this->search . '%'],
                ['pending', true],
                ['confirmed', true],
                ['processing', true],
                ['picked', true],
                ['delivered', true],
            ])->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.order.delevered');
    }

    public function singleOrder($order)
    {
        $component = 'delevered';
        $this->emit('singleOrderFromDeleverPage', $order, $component);
    }
}
