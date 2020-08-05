<?php

namespace App\Http\Livewire\Shopsection\Product;

use App\Admin\Product;
use Livewire\Component;

class Inactiveproduct extends Component
{
    public $search;

    public function render()
    {
        return view(
            'livewire.shopsection.product.inactiveproduct',
            [


                'products' => $this->search === null ?
                    Product::with('subcategory')->where([
                        ['status', false],
                    ])->get() :
                    Product::with('subcategory')->Where([
                        ['name', 'like', '%' . $this->search . '%'],
                        ['status', false],
                    ])->get()

            ]
        );
    }

    public function restore_product($product)
    {
        $this->emit('SSrestore_product', $product);
    }
    public function forceDelete_product($product)
    {
        $this->emit('SSforceDelete_product', $product);
    }
}
