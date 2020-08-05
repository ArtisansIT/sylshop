<?php

namespace App\Http\Livewire\Admin\OrderProcesing;

use Livewire\Component;
use App\Admin\Commision;
use App\Admin\Shopprocessdelever;

class SingleItem extends Component
{
    public $shop_id;

    public function mount($shop_id)
    {
        $this->shop_id = $shop_id;
    }
    public function render()
    {
        return view('livewire.admin.order-procesing.single-item', [
            'procecings' => Shopprocessdelever::with(
                'orderDetails.product:id,code,name',
                'orderDetails.product.image',
                'orderDetails.order',
                'variation',
            )
                ->where([
                    ['shop_id', $this->shop_id],
                    ['processing_status', true],
                    ['processing_payment_status', false],
                ])->get()
        ]);
    }

    public function withDraw($id)
    {
        $data = $this->findId($id);
        // dd($data->orderDetails->procecing_commision);

        $data->update([
            'processing_payment_status' => true
        ]);

        Commision::create([
            'shop_id' => $data->orderDetails->shop_id,
            'commission_amount' => $data->orderDetails->procecing_commision,
        ]);
    }

    public function add_to_delevered($id)
    {
        $data = $this->findId($id);
        // dd($data->orderDetails->procecing_commision);
        $data->update([
            'delevery_status' => true
        ]);
    }
    public function Reverse_procecing($id)
    {
        $data = $this->findId($id);
        // dd($data->orderDetails->procecing_commision);
        $data->update([
            'processing_status' => false,
            'delevery_status' => false
        ]);
    }

    public function findId($id)
    {
        return  Shopprocessdelever::with('orderDetails')->findOrFail($id);
    }

    public function print($id)
    {
        $data = Shopprocessdelever::with(
            'shop:id,name,address,phone,email,procecing_commision_rate',
            'orderDetails.order:id,code,created_at',
            'orderDetails.product:id,name,code'

        )->findOrFail($id); //   procecingCommision

        dd($data);
    }
}
