<?php

namespace App\Http\Livewire\Admin\Ordersection;

use App\Admin\Cancelorder;
use Livewire\Component;
use App\Admin\Orderdetails as AdminOrderdetails;

class OrderDetails extends Component
{
    public $singleorder = [];
    public $orderCode;
    public $page_name_variable_singleOrder_page;
    public function render()
    {
        return view('livewire.admin.ordersection.order-details');
    }

    public function mount($singleorder, $orderCode, $page_name_variable_singleOrder_page)
    {
        $this->singleorder = $singleorder;
        // dd($this->singleorder);
        $this->orderCode = $orderCode;
        $this->page_name_variable_singleOrder_page = $page_name_variable_singleOrder_page;
        // dd($this->page_name_variable_singleOrder_page);
    }

    public function backToPage()
    {
        $this->emit('return_back', $this->page_name_variable_singleOrder_page);
    }

    public function go_single_product($product, $variation)
    {
        $this->emit('go_single_product', $product, $variation);
    }

    public function check($orderDetails)
    {
        $currentOrderDetails = AdminOrderdetails::findOrFail($orderDetails);
        if (
            $currentOrderDetails->pending == true &&
            $currentOrderDetails->check == false
        ) {
            $currentOrderDetails->update([
                'pending' => !$currentOrderDetails->pending,
                'check' => !$currentOrderDetails->check
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'newOrder');
        } elseif (
            $currentOrderDetails->pending == false &&
            $currentOrderDetails->check == true
        ) {
            $currentOrderDetails->update([
                'pending' => !$currentOrderDetails->pending,
                'check' => !$currentOrderDetails->check
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'newOrder');
        } else {
            session()->flash('message', ' uncheck Your Current status ');
        }
    }

    public function received($orderDetails)
    {
        $currentOrderDetails = AdminOrderdetails::findOrFail($orderDetails);
        if (
            $currentOrderDetails->check == true &&
            $currentOrderDetails->received == false
        ) {
            $currentOrderDetails->update([
                'check' => !$currentOrderDetails->check,
                'received' => !$currentOrderDetails->received
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'chack');
        } elseif (
            $currentOrderDetails->check == false &&
            $currentOrderDetails->received == true
        ) {
            $currentOrderDetails->update([
                'check' => !$currentOrderDetails->check,
                'received' => !$currentOrderDetails->received
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'chack');
        } else {
            session()->flash('message', ' Complete Check Step First Or You Press a Worng step ');
        }
    }
    public function packing($orderDetails)
    {
        $currentOrderDetails = AdminOrderdetails::findOrFail($orderDetails);
        if (
            $currentOrderDetails->received == true &&
            $currentOrderDetails->packing == false
        ) {
            $currentOrderDetails->update([
                'received' => !$currentOrderDetails->received,
                'packing' => !$currentOrderDetails->packing
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'received');
        } elseif (
            $currentOrderDetails->received == false &&
            $currentOrderDetails->packing == true
        ) {
            $currentOrderDetails->update([
                'received' => !$currentOrderDetails->received,
                'packing' => !$currentOrderDetails->packing
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'received');
        } else {
            session()->flash('message', ' Complete received Step First You Press a Worng step ');
        }
    }
    public function shipped($orderDetails)
    {
        $currentOrderDetails = AdminOrderdetails::findOrFail($orderDetails);
        if (
            $currentOrderDetails->packing == true &&
            $currentOrderDetails->shipped == false
        ) {
            $currentOrderDetails->update([
                'packing' => !$currentOrderDetails->packing,
                'shipped' => !$currentOrderDetails->shipped
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'packing');
        } elseif (
            $currentOrderDetails->packing == false &&
            $currentOrderDetails->shipped == true
        ) {
            $currentOrderDetails->update([
                'packing' => !$currentOrderDetails->packing,
                'shipped' => !$currentOrderDetails->shipped
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'packing');
        } else {
            session()->flash('message', ' Complete packing Step First You Press a Worng step ');
        }
    }
    public function piked($orderDetails)
    {
        $currentOrderDetails = AdminOrderdetails::findOrFail($orderDetails);
        if (
            $currentOrderDetails->shipped == true &&
            $currentOrderDetails->piked == false
        ) {
            $currentOrderDetails->update([
                'shipped' => !$currentOrderDetails->shipped,
                'piked' => !$currentOrderDetails->piked
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'shipped');
        } elseif (
            $currentOrderDetails->shipped == false &&
            $currentOrderDetails->piked == true
        ) {
            $currentOrderDetails->update([
                'shipped' => !$currentOrderDetails->shipped,
                'piked' => !$currentOrderDetails->piked
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'shipped');
        } else {
            session()->flash('message', ' Complete shipped Step First You Press a Worng step ');
        }
    }
    public function delivered($orderDetails)
    {
        $currentOrderDetails = AdminOrderdetails::findOrFail($orderDetails);
        if (
            $currentOrderDetails->piked == true &&
            $currentOrderDetails->delivered == false
        ) {
            $currentOrderDetails->update([
                'piked' => !$currentOrderDetails->piked,
                'delivered' => !$currentOrderDetails->delivered
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'piked');
        } elseif (
            $currentOrderDetails->piked == false &&
            $currentOrderDetails->delivered == true
        ) {
            $currentOrderDetails->update([
                'piked' => !$currentOrderDetails->piked,
                'delivered' => !$currentOrderDetails->delivered
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'piked');
        } else {
            session()->flash('message', ' Complete piked Step First You Press a Worng step ');
        }
    }
    public function return($orderDetails)
    {
        $currentOrderDetails = AdminOrderdetails::findOrFail($orderDetails);
        if (
            $currentOrderDetails->delivered == true &&
            $currentOrderDetails->return == false
        ) {
            $currentOrderDetails->update([
                'delivered' => !$currentOrderDetails->delivered,
                'return' => !$currentOrderDetails->return
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'delivered');
        } elseif (
            $currentOrderDetails->delivered == false &&
            $currentOrderDetails->return == true
        ) {
            $currentOrderDetails->update([
                'delivered' => !$currentOrderDetails->delivered,
                'return' => !$currentOrderDetails->return
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'delivered');
        } else {
            session()->flash('message', ' Complete delivered Step First You Press a Worng step ');
        }
    }
    public function return_received($orderDetails)
    {
        $currentOrderDetails = AdminOrderdetails::findOrFail($orderDetails);
        if (
            $currentOrderDetails->return == true &&
            $currentOrderDetails->return_received == false
        ) {
            $currentOrderDetails->update([
                'return' => !$currentOrderDetails->return,
                'return_received' => !$currentOrderDetails->return_received
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'return');
        } elseif (
            $currentOrderDetails->return == false &&
            $currentOrderDetails->return_received == true
        ) {
            $currentOrderDetails->update([
                'return' => !$currentOrderDetails->return,
                'return_received' => !$currentOrderDetails->return_received
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'return');
        } else {
            session()->flash('message', ' Complete return Step First You Press a Worng step ');
        }
    }
    public function handover($orderDetails)
    {
        $currentOrderDetails = AdminOrderdetails::findOrFail($orderDetails);
        if (
            $currentOrderDetails->return_received == true &&
            $currentOrderDetails->handover == false
        ) {
            $currentOrderDetails->update([
                'return_received' => !$currentOrderDetails->return_received,
                'handover' => !$currentOrderDetails->handover
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'return_received');
        } elseif (
            $currentOrderDetails->return_received == false &&
            $currentOrderDetails->handover == true
        ) {
            $currentOrderDetails->update([
                'return_received' => !$currentOrderDetails->return_received,
                'handover' => !$currentOrderDetails->handover
            ]);
            $this->emit('go_back_to_index_after_change_a_step', 'return_received');
        } else {
            session()->flash('message', ' Complete return_received Step First You Press a Worng step ');
        }
    }

    public function cancel($orderDetails)
    {

        $data = AdminOrderdetails::with('product.stock')->findOrFail($orderDetails);
        Cancelorder::create([
            'user_id' => $data->order->user_id,
            'order_id' => $data->order->id,
            'variation_id' => $data->variation_id,
            'product_id' => $data->product_id,
            'quentity' => $data->quentity,
        ]);
        if (empty($data->variation_id)) {
            $data->product->stock->stock =  $data->product->stock->stock  + $data->quentity;
            $data->product->stock->save();
        } else {
            $data->variation->stock =  $data->variation->stock + $data->quentity;
            $data->variation->save();
        }
        $data->delete();
        $this->emit('go_back_to_index_after_change_a_step', 'newOrder');
    }
    public function shopCancel($orderDetails)
    {

        $data = AdminOrderdetails::with('product.stock')->findOrFail($orderDetails);
        Cancelorder::create([
            'shop_id' => $data->shop_id,
            'order_id' => $data->order->id,
            'variation_id' => $data->variation_id,
            'product_id' => $data->product_id,
            'quentity' => $data->quentity,
        ]);
        if (empty($data->variation_id)) {
            $data->product->stock->stock =  $data->product->stock->stock  + $data->quentity;
            $data->product->stock->save();
        } else {
            $data->variation->stock =  $data->variation->stock + $data->quentity;
            $data->variation->save();
        }
        $data->delete();
        $this->emit('go_back_to_index_after_change_a_step', 'newOrder');
    }
}
