<?php

namespace App\Http\Livewire\Admin\Ordersection;

use App\Admin\Variation;
use Livewire\Component;

class SingleProduct extends Component
{

    public $product;
    public $variation;
    public $component_identy_variable;
    public function render()
    {
        return view('livewire.admin.ordersection.single-product');
    }

    public function mount($product, $variation, $component_identy_variable)
    {
        $this->product = $product;
        $this->component_identy_variable = $component_identy_variable;
        // dd($this->component_identy_variable);
        if (!empty($variation)) {
            $this->variation = Variation::findOrFail($variation);
        }
    }
}
