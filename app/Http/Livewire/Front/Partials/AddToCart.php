<?php

namespace App\Http\Livewire\Front\Partials;

use App\Facades\Cart;
use App\Admin\Product;
use Livewire\Component;

class AddToCart extends Component
{

    protected $listeners = [
        'addToCart',

    ];
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.front.partials.add-to-cart');
    }

    public function addToCart($productId)
    {
        Cart::add(Product::where('id', $productId)->first());
        $this->emit('productAdded');
    }
}
