<?php

namespace App\Http\Livewire\Admin\Product\Variation;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.product.variation.index');
    }


    public function createVariation($product)
    {
        $this->emit('createVariation', $product);
    }
}
