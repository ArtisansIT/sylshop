<?php

namespace App\Http\Livewire\User\Dashboard\Ordersection;

use App\Admin\Order;
use Livewire\Component;

class OrderProcessing extends Component
{
    public $orderProceingPage;
    public $singleOrderPage; // view single orders not details
    public $singleOrderDetails; // view single in Details

    public $sigleOrderValue;
    public $current_page_sstatus;


    public $currentOrder; // single Order Variable
    public $currentComponent; // single Order Variable


    public $new;
    public $confirmed;
    public $processing;
    public $packing;
    public $delivered;
    public $return;
    public $return_received;


    protected $listeners = [

        'backToMain' => 'backToMain',
        'viewSingleOrderDetails',
        'backTo_single_order'

    ];
    public function mount()
    {
        $this->orderProceingPage = true;
        $this->singleOrderPage = false;
        $this->singleOrderDetails = false;
        $this->new = $this->step('pending');
        $this->confirmed = $this->step('check');
        $this->processing = $this->step('received');
        $this->packing = $this->step('packing');
        $this->delivered = $this->step('delivered');
        $this->return = $this->step('return');
        $this->return_received = $this->step('return_received');
        // dd($this->new);
    }


    public function render()
    {
        return view('livewire.user.dashboard.ordersection.order-processing');
    }
    public function step($step)
    {
        return Order::with(['details' => function ($query) use ($step) {
            $query->where($step, true);
        }])->whereHas('details', function ($query)  use ($step) {
            $query->where($step, true);
        })->latest()->get();
    }

    public function viewSingleOrder($page)
    {
        if ($page == 'new') {
            $this->current_page_sstatus = 'pending';
            $this->sigleOrderValue =  $this->new;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        } elseif ($page == 'confirmed') {
            $this->current_page_sstatus = 'confirmed';
            $this->sigleOrderValue =   $this->confirmed;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        } elseif ($page == 'processing') {
            $this->current_page_sstatus = 'received';
            $this->sigleOrderValue =  $this->processing;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        } elseif ($page == 'packing') {
            $this->current_page_sstatus = 'packing';
            $this->sigleOrderValue =  $this->packing;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        } elseif ($page == 'delivered') {
            $this->current_page_sstatus = 'delivered';
            $this->sigleOrderValue =  $this->delivered;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        } elseif ($page == 'return') {
            $this->current_page_sstatus = 'return';
            $this->sigleOrderValue =  $this->return;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        } elseif ($page == 'return_received') {
            $this->current_page_sstatus = 'return_received';
            $this->sigleOrderValue =  $this->return_received;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        }
    }

    public function backToMain()
    {
        $this->mount();
    }

    public function viewSingleOrderDetails($order, $component)
    {
        $this->currentOrder =
            Order::with(['details' => function ($query) use ($component) {
                $query->where($component, true);
            }])->findOrFail($order);

        $this->currentComponent = $component;
        $this->orderProceingPage = false;
        $this->singleOrderPage = false;
        $this->singleOrderDetails = true;
        // dd($this->currentOrder);
    }
    public function backTo_single_order()
    {
        $this->orderProceingPage = false;
        $this->singleOrderPage = true;
        $this->singleOrderDetails = false;
    }
}
