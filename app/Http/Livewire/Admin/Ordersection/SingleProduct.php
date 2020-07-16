<?php

namespace App\Http\Livewire\Admin\Ordersection;

use App\Admin\Variation;
use Livewire\Component;

class SingleProduct extends Component
{

    public $product;
    public $variation;
    public function render()
    {
        return view('livewire.admin.ordersection.single-product');
    }

    public function mount($product, $variation)
    {
        $this->product = $product;
        $this->variation = $variation;
        if (!empty($this->variation)) {
            $this->variation = Variation::with('product')->findOrFail($variation);
        }
        // dd($this->product);
    }

    public function backTo_single_order()
    {
        $this->emit('backTo_single_order_from_product_page');
    }
}
