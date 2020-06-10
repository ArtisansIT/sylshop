<?php

namespace App\Http\Livewire\Front\Pages\Dashboard;

use App\Admin\Order;
use Livewire\Component;

class SingleOrder extends Component
{

    public $order;
    public $order_id;
    public $currentComponent;

    protected $listeners = [
        'single',
    ];

    public function mount($singleOrder, $currentComponent)
    {
        $this->order = $singleOrder;
        $this->currentComponent = $currentComponent;
        // dd($this->order);
    }
    public function render()
    {
        return view('livewire.front.pages.dashboard.single-order');
    }

    public function backToPendingPage()
    {
        $this->emit('back', $this->currentComponent);
    }
}
