<?php

namespace App\Http\Livewire\Front\Partials;

use App\Admin\Coupane as AdminCoupane;
use Illuminate\Support\Arr;
use Livewire\Component;

class Coupane extends Component
{
    public $coupane;
    public $data;
    public $discount;

    public function render()
    {
        return view('livewire.front.partials.coupane');
    }

    public function addCoupane()
    {
        $cop = AdminCoupane::where('code', $this->coupane)->first();
        $cart = collect(session()->get('cart'));

        if (!empty($cop)) {

            if (
                !empty($cop->category_id)  &&
                $cop->shop_id == null &&
                $cop->subcategory_id == null
            ) {
                $this->data = $cart->where('category_id', $cop->category_id)->all();
            } elseif (
                !empty($cop->category_id)  &&
                !empty($cop->shop_id)  &&
                $cop->subcategory_id == null
            ) {
                $this->data = $cart->where('category_id', $cop->category_id)
                    ->where('shop_id', $cop->shop_id)
                    ->all();
            } elseif (
                !empty($cop->category_id)  &&
                !empty($cop->shop_id)  &&
                !empty($cop->subcategory_id)

            ) {
                $this->data = $cart->where('category_id', $cop->category_id)
                    ->where('shop_id', $cop->shop_id)
                    ->where('subcategory_id', $cop->subcategory_id)
                    ->all();
            }

            if (!empty($this->data)) {

                $coupane_has_total = collect($this->data)->pluck('total')->sum();
                if ($coupane_has_total >= $cop->total) {
                    $this->discount = $cop->discount;
                    $this->emit('coupaneActive', $this->discount);
                    $this->coupane = '';
                } else {
                    $need_to_buy = $cop->total - $coupane_has_total;
                    session()->flash('message', 'You Need To Buy More' . ' ' .
                        $need_to_buy . '      ' . 'TK  On Specefic Iteam');
                    $this->coupane = '';
                }
            } else {

                session()->flash('message', 'Invalide Coupane.');
                $this->coupane = '';
            }
        } else {
            session()->flash('message', 'Invalide Coupane.');
            $this->coupane = '';
        }




        // dd(collect($this->data)->pluck('total')->sum());
    }
}
