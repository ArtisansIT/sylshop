<?php

namespace App\Http\Livewire\Shopsection\Orderprocessing;

use Livewire\Component;

class SingleOrderWithDetails extends Component
{

    public $orders;
    public $current_page_status;

    public function mount($orders, $current_page_status)
    {
        $this->orders = $orders;

        // dd($this->orders);
        $this->current_page_status = $current_page_status;
        // dd($this->orders);
    }
    public function render()
    {
        return view('livewire.shopsection.orderprocessing.single-order-with-details');
    }

    public function viewSingleOrderDetails($order)
    {
        $this->emit('Shop_viewSingleOrderDetails', $order, $this->current_page_status);
    }
}
