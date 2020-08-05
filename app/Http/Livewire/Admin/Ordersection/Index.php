<?php

namespace App\Http\Livewire\Admin\Ordersection;

use App\Admin\Order;
use App\Admin\Product;
use Livewire\Component;

class Index extends Component
{
    public $orders;


    //Component Page name
    public $indexComponent;
    public $singleOrderPage;
    public $singleOrder_DetailsPage;
    public $single_product_page;

    // Variables pass To Components
    public $OrderDetails_for_SingleOrder;
    public $OrderCode_for_SingleOrder;
    public $page_name_variable_singleOrder_page;
    public $product_details_variable,
        $product_variation_variable,
        $variable_for_back_to_index_page;





    protected $listeners = [

        'orderReceives',
        'return_back' => 'return_back',
        'go_back_to_index_after_change_a_step' => 'return_back',
        'go_single_product' => 'go_single_product',
        'backTo_single_order_from_product_page',
        'adfsf',
        'realtimeorder'
    ];
    public function mount()
    {
        $this->page_name_variable_singleOrder_page = 'pending';
        $this->singleOrderPage = false;
        $this->singleOrder_DetailsPage = false;
        $this->single_product_page = false;
        $this->indexComponent = true;
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('pending', true);
            })->latest()->get();
    }

    public function orderReceives()
    {
        $this->mount();
    }
    public function render()
    {
        return view('livewire.admin.ordersection.index');
    }
    public function newOrder()
    {
        $this->page_name_variable_singleOrder_page = 'pending';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('pending', true);
            })->latest()->get();
    }
    public function chack()
    {
        $this->page_name_variable_singleOrder_page = 'check';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('check', true);
            })->latest()->get();
    }
    public function Received()
    {
        $this->page_name_variable_singleOrder_page = 'received';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('received', true);
            })->latest()->get();
    }
    public function Packing()
    {
        $this->page_name_variable_singleOrder_page = 'packing';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('packing', true);
            })->latest()->get();
    }
    public function Shipped()
    {
        $this->page_name_variable_singleOrder_page = 'shipped';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('shipped', true);
            })->latest()->get();
    }
    public function Piked()
    {
        $this->page_name_variable_singleOrder_page = 'piked';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('piked', true);
            })->latest()->get();
    }
    public function Delivered()
    {
        $this->page_name_variable_singleOrder_page = 'delivered';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('delivered', true);
            })->latest()->get();
    }
    public function Return()
    {
        $this->page_name_variable_singleOrder_page = 'return';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('return', true);
            })->latest()->get();
    }
    public function Return_Received()
    {
        $this->page_name_variable_singleOrder_page = 'return_Received';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('return_received', true);
            })->latest()->get();
    }
    public function ReturnHandhover()
    {
        $this->page_name_variable_singleOrder_page = 'handover';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('handover', true);
            })->latest()->get();
    }
    public function Cancel()
    {
        $this->page_name_variable_singleOrder_page = 'Cancel';
        $this->orders =
            Order::whereHas('details', function ($query) {
                $query->where('cancel', true);
            })->latest()->get();
    }
    public function Orders_Shop_Cancel()
    {
        $this->page_name_variable_singleOrder_page = 'Orders_Shop_Cancel';
        $this->orders =
            Order::with(['details' => function ($query) {
                $query->where('shopCancel', true);
            }, 'details.process'])->whereHas('details', function ($query) {
                $query->where('shopCancel', true);
            })->latest()->get();
    }

    public function Go_Single_order_details_page($orderDetails, $orderCode)
    {
        // dd($orderCode);
        $this->OrderDetails_for_SingleOrder = $orderDetails;
        $this->OrderCode_for_SingleOrder = $orderCode;
        // dd($this->OrderCode_for_SingleOrder);
        $this->indexComponent = false;
        $this->single_product_page = false;
        $this->singleOrderPage = true;
    }

    public function return_back($currentComponent)
    {
        $this->indexComponent = true;
        $this->return_redirect_back($currentComponent);
    }

    public function return_redirect_back($currentComponent)
    {
        // dd($currentComponent);
        if ($currentComponent == 'newOrder') {
            return  $this->newOrder();
        } elseif ($currentComponent == 'chack') {
            return  $this->chack();
        } elseif ($currentComponent == 'received') {
            return  $this->received();
        } elseif ($currentComponent == 'packing') {
            return  $this->packing();
        } elseif ($currentComponent == 'shipped') {
            return  $this->shipped();
        } elseif ($currentComponent == 'piked') {
            return  $this->piked();
        } elseif ($currentComponent == 'delivered') {
            return  $this->delivered();
        } elseif ($currentComponent == 'return') {
            return  $this->return();
        } elseif ($currentComponent == 'return_received') {
            return  $this->return_received();
        } elseif ($currentComponent == 'handover') {
            return  $this->handover();
        } elseif ($currentComponent == 'cancel') {
            return  $this->cancel();
        } elseif ($currentComponent == 'shopCancel') {
            return  $this->shopCancel();
        }
    }

    public function go_single_product($product, $variation)
    {
        $this->product_details_variable = Product::with(
            'image',
            'category',
            'subcategory'
        )->findOrFail($product);
        $this->product_variation_variable = $variation;
        $this->variable_for_back_to_index_page = 'admin_order_page';
        // dd($this->product_details_variable);
        $this->indexComponent = false;
        $this->single_product_page = true;
        $this->singleOrderPage = false;
    }

    public function backTo_single_order_from_product_page()
    {
        $this->indexComponent = false;
        $this->single_product_page = false;
        $this->singleOrderPage = true;
    }

    public function realtimeorder()
    {
        $this->mount();
    }
}
