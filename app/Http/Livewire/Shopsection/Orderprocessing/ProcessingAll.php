<?php

namespace App\Http\Livewire\Shopsection\Orderprocessing;

use App\Admin\Order;
use Livewire\Component;

class ProcessingAll extends Component
{

    public $orderProceingPage;
    public $singleOrderPage; // view single orders not details
    public $singleOrderDetails; // view single in Details

    public $sigleOrderValue;
    public $current_page_sstatus;


    public $currentOrder; // single Order Variable
    public $currentComponent; // single Order Variable


    // public $new;
    public $confirmed;
    public $received;
    public $packing;
    public $shipped;
    public $piked;
    public $delivered;
    public $return;
    public $return_received;


    protected $listeners = [

        'Shop_backToMain' => 'backToMain',
        'Shop_viewSingleOrderDetails' => 'viewSingleOrderDetails',
        'Shop_backTo_single_orderrrr' => 'backTo_single_order'

    ];
    public function mount()
    {
        $this->orderProceingPage = true;
        $this->singleOrderPage = false;
        $this->singleOrderDetails = false;
        // $this->new = $this->step('pending');
        $this->confirmed = $this->step('check');
        $this->received = $this->step('received');
        $this->packing = $this->step('packing');
        $this->shipped = $this->step('shipped');
        $this->piked = $this->step('piked');
        $this->delivered = $this->step('delivered');
        $this->return = $this->step('return');
        $this->return_received = $this->step('return_received');
        // dd($this->new);
    }

    public function render()
    {
        return view('livewire.shopsection.orderprocessing.processing-all');
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
        // dd('dfdfdf');
        if ($page == 'confirmed') {
            $this->current_page_sstatus = 'check';
            $this->sigleOrderValue =   $this->confirmed;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        } elseif ($page == 'received') {
            $this->current_page_sstatus = 'received';
            $this->sigleOrderValue =  $this->received;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        } elseif ($page == 'packing') {
            $this->current_page_sstatus = 'packing';
            $this->sigleOrderValue =  $this->packing;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        } elseif ($page == 'shipped') {
            $this->current_page_sstatus = 'shipped';
            $this->sigleOrderValue =  $this->shipped;
            $this->orderProceingPage = false;
            $this->singleOrderPage = true;
        } elseif ($page == 'piked') {
            $this->current_page_sstatus = 'piked';
            $this->sigleOrderValue =  $this->piked;
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
        // dd('dfdfdf');
        $this->orderProceingPage = false;
        $this->singleOrderPage = true;
        $this->singleOrderDetails = false;
    }
}
