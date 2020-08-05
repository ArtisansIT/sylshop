<?php

namespace App\Http\Livewire\Shopsection\Product;

use App\Admin\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;
    public function mount($product)
    {
        $this->product =
            Product::with('image', 'variations', 'category', 'subcategory', 'stock', 'shop')
            ->findOrFail($product);
    }
    public function render()
    {
        return view('livewire.shopsection.product.single-product');
    }
}
