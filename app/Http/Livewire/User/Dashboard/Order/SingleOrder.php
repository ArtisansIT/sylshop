<?php

namespace App\Http\Livewire\User\Dashboard\Order;

use Livewire\Component;

class SingleOrder extends Component
{

    public $order;
    public $order_id;
    public $currentComponent;
    public $comment_page;
    public $product_id_go_to_comment_page;
    public $this_pro_has_same_proid_order_id;


    protected $listeners = [
        'single',
        'singleOrder_component_bacame_live_from_commentpage'
    ];

    public function mount($singleOrder, $currentComponent)
    {

        $this->order = $singleOrder;
        // dd($this->order);
        $this->currentComponent = $currentComponent;
        $this->comment_page = false;
        // dd($this->order);
    }
    public function render()
    {
        return view('livewire.user.dashboard.order.single-order');
    }

    public function back()
    {
        $this->emit('backTo_single_order');
        // $this->mount($this->order, $this->currentComponent);
    }
    public function go_commentpage($product)
    {

        $this->product_id_go_to_comment_page = $product;
        $this->comment_page = true;
    }

    public function singleOrder_component_bacame_live_from_commentpage()
    {
        $this->comment_page = false;
    }
}
