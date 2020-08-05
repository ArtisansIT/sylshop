<?php

namespace App\Http\Livewire\Admin\Ordersection;

use Livewire\Component;
use App\Admin\Cancelorder;
use App\Admin\Shopprocessdelever;
use App\Admin\Orderdetails as AdminOrderdetails;
use PhpOffice\PhpWord\TemplateProcessor;

class OrderDetails extends Component
{
    public $singleorder;
    public $orderCode;

    public $update;
    public $page_name_variable_singleOrder_page;


    public function render()
    {
        return view('livewire.admin.ordersection.order-details', [
            'allorderDetails' => AdminOrderdetails::with('process')->where([
                [$this->page_name_variable_singleOrder_page, true],
                ['order_id', $this->singleorder],
            ])->get()
        ]);
    }

    public function mount($singleorder, $orderCode, $page_name_variable_singleOrder_page)
    {
        $this->singleorder = $singleorder;
        // dd($this->singleorder);
        $this->orderCode = $orderCode;
        $this->page_name_variable_singleOrder_page = $page_name_variable_singleOrder_page;
        // dd($this->page_name_variable_singleOrder_page);
    }


    public function check($orderDetails)
    {
        $currentOrderDetails = $this->findOrderDetails($orderDetails);
        // dd($currentOrderDetails);
        if (
            $currentOrderDetails->pending == true &&
            $currentOrderDetails->check == false
        ) {
            $currentOrderDetails->update([
                'pending' => !$currentOrderDetails->pending,
                'check' => !$currentOrderDetails->check
            ]);
            // $this->emit('go_back_to_index_after_change_a_step', 'newOrder');
        } elseif (
            $currentOrderDetails->pending == false &&
            $currentOrderDetails->check == true
        ) {
            $currentOrderDetails->update([
                'pending' => !$currentOrderDetails->pending,
                'check' => !$currentOrderDetails->check
            ]);
            // $this->emit('go_back_to_index_after_change_a_step', 'newOrder');
        } else {
            session()->flash('message', ' uncheck Your Current status ');
        }
    }

    public function received($orderDetails)
    {
        $currentOrderDetails = $this->findOrderDetails($orderDetails);
        if (
            $currentOrderDetails->check == true &&
            $currentOrderDetails->received == false
        ) {
            $currentOrderDetails->update([
                'check' => !$currentOrderDetails->check,
                'received' => !$currentOrderDetails->received
            ]);
            // $this->emit('go_back_to_index_after_change_a_step', 'chack');
        } elseif (
            $currentOrderDetails->check == false &&
            $currentOrderDetails->received == true
        ) {
            $currentOrderDetails->update([
                'check' => !$currentOrderDetails->check,
                'received' => !$currentOrderDetails->received
            ]);
            // $this->emit('go_back_to_index_after_change_a_step', 'chack');
        } else {
            session()->flash(
                'message',

                ' Complete Check Step First Or You Press a Worng step '
            );
        }
    }
    public function packing($orderDetails)
    {
        $currentOrderDetails = $this->findOrderDetails($orderDetails);
        if (
            $currentOrderDetails->received == true &&
            $currentOrderDetails->packing == false
        ) {
            $currentOrderDetails->update([
                'received' => !$currentOrderDetails->received,
                'packing' => !$currentOrderDetails->packing
            ]);
        } elseif (
            $currentOrderDetails->received == false &&
            $currentOrderDetails->packing == true
        ) {
            $currentOrderDetails->update([
                'received' => !$currentOrderDetails->received,
                'packing' => !$currentOrderDetails->packing
            ]);
        } else {
            session()->flash('message', ' Complete received Step First You Press a Worng step ');
        }
    }
    public function shipped($orderDetails)
    {
        $currentOrderDetails = $this->findOrderDetails($orderDetails);
        if (
            $currentOrderDetails->packing == true &&
            $currentOrderDetails->shipped == false
        ) {
            $currentOrderDetails->update([
                'packing' => !$currentOrderDetails->packing,
                'shipped' => !$currentOrderDetails->shipped
            ]);
        } elseif (
            $currentOrderDetails->packing == false &&
            $currentOrderDetails->shipped == true
        ) {
            $currentOrderDetails->update([
                'packing' => !$currentOrderDetails->packing,
                'shipped' => !$currentOrderDetails->shipped
            ]);
        } else {
            session()->flash('message', ' Complete packing Step First You Press a Worng step ');
        }
    }
    public function piked($orderDetails)
    {
        $currentOrderDetails = $this->findOrderDetails($orderDetails);
        if (
            $currentOrderDetails->shipped == true &&
            $currentOrderDetails->piked == false
        ) {
            $currentOrderDetails->update([
                'shipped' => !$currentOrderDetails->shipped,
                'piked' => !$currentOrderDetails->piked
            ]);
        } elseif (
            $currentOrderDetails->shipped == false &&
            $currentOrderDetails->piked == true
        ) {
            $currentOrderDetails->update([
                'shipped' => !$currentOrderDetails->shipped,
                'piked' => !$currentOrderDetails->piked
            ]);
        } else {
            session()->flash('message', ' Complete shipped Step First You Press a Worng step ');
        }
    }
    public function delivered($orderDetails)
    {
        $currentOrderDetails = $this->findOrderDetails($orderDetails);
        if (
            $currentOrderDetails->piked == true &&
            $currentOrderDetails->delivered == false
        ) {
            $currentOrderDetails->update([
                'piked' => !$currentOrderDetails->piked,
                'delivered' => !$currentOrderDetails->delivered
            ]);
        } elseif (
            $currentOrderDetails->piked == false &&
            $currentOrderDetails->delivered == true
        ) {
            $currentOrderDetails->update([
                'piked' => !$currentOrderDetails->piked,
                'delivered' => !$currentOrderDetails->delivered
            ]);
        } else {
            session()->flash('message', ' Complete piked Step First You Press a Worng step ');
        }
    }
    public function return($orderDetails)
    {
        $currentOrderDetails = $this->findOrderDetails($orderDetails);
        if (
            $currentOrderDetails->delivered == true &&
            $currentOrderDetails->return == false
        ) {
            $currentOrderDetails->update([
                'delivered' => !$currentOrderDetails->delivered,
                'return' => !$currentOrderDetails->return
            ]);
        } elseif (
            $currentOrderDetails->delivered == false &&
            $currentOrderDetails->return == true
        ) {
            $currentOrderDetails->update([
                'delivered' => !$currentOrderDetails->delivered,
                'return' => !$currentOrderDetails->return
            ]);
        } else {
            session()->flash('message', ' Complete delivered Step First You Press a Worng step ');
        }
    }
    public function return_received($orderDetails)
    {
        $currentOrderDetails = $this->findOrderDetails($orderDetails);
        if (
            $currentOrderDetails->return == true &&
            $currentOrderDetails->return_received == false
        ) {
            $currentOrderDetails->update([
                'return' => !$currentOrderDetails->return,
                'return_received' => !$currentOrderDetails->return_received
            ]);
        } elseif (
            $currentOrderDetails->return == false &&
            $currentOrderDetails->return_received == true
        ) {
            $currentOrderDetails->update([
                'return' => !$currentOrderDetails->return,
                'return_received' => !$currentOrderDetails->return_received
            ]);
        } else {
            session()->flash('message', ' Complete return Step First You Press a Worng step ');
        }
    }
    public function handover($orderDetails)
    {
        $currentOrderDetails = $this->findOrderDetails($orderDetails);
        if (
            $currentOrderDetails->return_received == true &&
            $currentOrderDetails->handover == false
        ) {
            $currentOrderDetails->update([
                'return_received' => !$currentOrderDetails->return_received,
                'handover' => !$currentOrderDetails->handover
            ]);
        } elseif (
            $currentOrderDetails->return_received == false &&
            $currentOrderDetails->handover == true
        ) {
            $currentOrderDetails->update([
                'return_received' => !$currentOrderDetails->return_received,
                'handover' => !$currentOrderDetails->handover
            ]);
        } else {
            session()->flash('message', ' Complete return_received Step First You Press a Worng step ');
        }
    }

    public function findOrderDetails($orderDetails_id)
    {
        return  AdminOrderdetails::with('process')->findOrFail($orderDetails_id);
    }

    public function cancel($orderDetails)
    {

        $data = AdminOrderdetails::with('product.stock')->findOrFail($orderDetails);
        Cancelorder::create([
            'user_id' => $data->order->user_id,
            // 'order_id' => $data->order->id,
            'variation_id' => $data->variation_id,
            'product_id' => $data->product_id,
            'quentity' => $data->quentity,
            'price' => $data->price,
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
            // 'order_id' => $data->order->id,
            'variation_id' => $data->variation_id,
            'product_id' => $data->product_id,
            'quentity' => $data->quentity,
            'price' => $data->price,
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

    public function procecing($orderDetail_id)
    {



        $data = $this->findOrderDetails($orderDetail_id);
        if (!empty($data->process)) {
            return false;
        }
        Shopprocessdelever::create([
            'shop_id' => $data->shop_id,
            'orderdetails_id' => $data->id,
            'processing_status' => true,
        ]);
        // $this->mount($this->singleorder, $this->orderCode, $this->page_name_variable_singleOrder_page);
    }
    public function delevery($orderDetail_id)
    {



        $data = $this->findOrderDetails($orderDetail_id);
        if (empty($data->process)  || $data->process->processing_status == false) {
            return false;
        }
        $data->process->update([
            'delevery_status' => true,
        ]);
        // $this->mount($this->singleorder, $this->orderCode, $this->page_name_variable_singleOrder_page);
    }
}
