<?php

namespace App\Http\Livewire\Front\Partials;

use App\Admin\Category;
use Livewire\Component;
use App\Facades\Cart;

class Header extends Component
{



    public $cartTotal = 0;

    protected $listeners = [
        'productAdded' => 'updateCartTotal',
        'productRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal'
    ];
    public function render()
    {
        return view('livewire.front.partials.header', [
            'categorys' => Category::with(['shop', 'shop.subcategorys'])
                ->get()
        ]);
    }

    public function updateCartTotal()
    {
        $this->cartTotal = count(Cart::get()['products']);
    }
}
