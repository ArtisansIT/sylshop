<?php

namespace App\Http\Livewire\Front\Partials;

use Livewire\Component;

class CartSize extends Component
{


    public $cartSize = 0;


    protected $listeners = [
        'updateHeaderTwoCartNumber' => 'updateCartTotal',
        'resetCurtnumber' => 'resetCurtnumber',
        'removeFromSmallCart' => 'removeFromSmallCart',
        'removeFromSmallCartToUpdateCartPage' => 'removeFromSmallCart',

    ];

    public function mount()
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            $this->cartSize = count($cart);
        }
    }

    public function updateCartTotal()
    {

        if (session()->has('cart')) {
            $cart = session()->get('cart');
            $this->cartSize = count($cart);
        }
    }

    public function removeFromSmallCart()
    {
        $this->mount();
    }

    public function resetCurtnumber()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.front.partials.cart-size');
    }
}
