<?php

namespace App\Http\Livewire\Front\Partials;

use App\Admin\Product;
use Livewire\Component;
use App\Admin\Variation;

class ChangeVariation extends Component
{
    public $product;
    public $variation_id;
    // public $productBasePrice;
    public $productVariation;


    public function mount($product)
    {
        // $this->productBasePrice = true;

        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.front.partials.change-variation');
    }

    public function changeVariation()
    {

        if (!empty($this->variation_id)) {

            $data = Variation::findOrFail($this->variation_id);

            session()->put('variation', $data);
            $this->product->main_price = $data->sale_price;
            $this->product->offer_price = $data->offer_price;
        } else {
            session()->forget('variation');
        }
    }
}
