<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Order;
use Livewire\Component;

class Dashboard extends Component
{
    public $allPendingOrderPage;
    public $allConfirmedOrderPage;
    public $allProcessingOrderPage;
    public $allPickedOrderPage;
    public $allDeleveredOrderPage;


    public $singleOrderPage;


    public $currentOrder;
    public $currentComponent;


    protected $listeners = [
        'showDelailsOrderStatusFalse' => 'singleOrderShow',
        'back' => 'return_redirect_back',
    ];
    public function mount()
    {
        $this->allPendingOrderPage = true;
        $this->allConfirmedOrderPage = false;
        $this->allProcessingOrderPage = false;
        $this->allPickedOrderPage = false;
        $this->allDeleveredOrderPage = false;
        $this->singleOrderPage = false;
    }
    public function resetAllPageValue()
    {
        $this->allPendingOrderPage = false;
        $this->allConfirmedOrderPage = false;
        $this->allProcessingOrderPage = false;
        $this->allPickedOrderPage = false;
        $this->allDeleveredOrderPage = false;
        $this->singleOrderPage = false;
    }

    public function render()
    {
        return view('livewire.front.pages.dashboard');
    }

    public function singleOrderShow($order, $component)
    {
        $this->currentOrder = Order::with(['details.product.image', 'pickup'])
            ->findOrFail($order);
        $this->currentComponent = $component;

        $this->resetAllPageValue();
        $this->singleOrderPage = true;
    }

    public function return_redirect_back($currentComponent)
    {
        $this->resetAllPageValue();
        if ($currentComponent == 'Pending') {
            $this->allPendingOrderPage = true;
        } elseif ($currentComponent == 'ProcessingOrder') {
            $this->allProcessingOrderPage = true;
        } elseif ($currentComponent == 'PickedOrder') {
            $this->allPickedOrderPage = true;
        } elseif ($currentComponent == 'DeliveredOder') {
            $this->allDeleveredOrderPage = true;
        } elseif ($currentComponent == 'ConfirmeOrder') {
            $this->allConfirmedOrderPage = true;
        }
    }

    public function goPendingOrderPage()
    {
        $this->resetAllPageValue();
        $this->allPendingOrderPage = true;
    }
    public function goConfirmedPage()
    {
        $this->resetAllPageValue();
        $this->allConfirmedOrderPage = true;
    }
    public function goProcessingPage()
    {
        $this->resetAllPageValue();
        $this->allProcessingOrderPage = true;
    }
    public function goPickedPage()
    {
        $this->resetAllPageValue();
        $this->allPickedOrderPage = true;
    }
    public function goDeliveredPage()
    {
        $this->resetAllPageValue();
        $this->allDeleveredOrderPage = true;
    }
}
