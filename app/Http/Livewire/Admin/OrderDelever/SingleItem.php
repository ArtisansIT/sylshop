<?php

namespace App\Http\Livewire\Admin\OrderDelever;

use Livewire\Component;
use App\Admin\Commision;
use App\Admin\Shopprocessdelever;
use Illuminate\Support\Facades\DB;

class SingleItem extends Component
{

    public $shop_id;

    public function mount($shop_id)
    {
        $this->shop_id = $shop_id;
        // $result = Shopprocessdelever::select(DB::raw('YEAR(created_at) as year', 'MONTH(created_at) month , DAY(created_at) day'))->distinct()->get();
        // $years = $result->pluck('month', 'day');
        // dd($result);
    }
    public function render()
    {
        return view('livewire.admin.order-delever.single-item', [
            'delevers' => Shopprocessdelever::with(
                'orderDetails.product:id,code,name',
                'orderDetails.product.image',
                'orderDetails.order',
                'variation',
            )
                ->where([
                    ['shop_id', $this->shop_id],
                    ['delevery_status', true],
                    ['delevery_payment_status', false],
                ])->get()
        ]);
    }

    public function withDraw($id)
    {
        $data = $data = $this->findId($id);
        // dd($data->orderDetails->procecing_commision);
        $data->update([
            'delevery_payment_status' => true
        ]);

        Commision::create([
            'shop_id' => $data->orderDetails->shop_id,
            'commission_amount' => $data->orderDetails->delevered_commision,
        ]);
    }

    public function Reverse_Delevered($id)
    {
        $data = $this->findId($id);
        // dd($data->orderDetails->procecing_commision);
        $data->update([
            'delevery_status' => false
        ]);
    }

    public function findId($id)
    {
        return  Shopprocessdelever::with('orderDetails')->findOrFail($id);
    }
}
