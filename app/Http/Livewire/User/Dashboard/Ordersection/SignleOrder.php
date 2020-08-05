<?php

namespace App\Http\Livewire\User\Dashboard\Ordersection;

use Livewire\Component;

class SignleOrder extends Component
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
        return view('livewire.user.dashboard.ordersection.signle-order');
    }

    public function backToMain()
    {
        $this->emit('backToMain');
    }

    public function viewSingleOrderDetails($order)
    {
        $this->emit('viewSingleOrderDetails', $order, $this->current_page_status);
    }
}
