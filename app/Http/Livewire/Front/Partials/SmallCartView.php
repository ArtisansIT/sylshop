<?php

namespace App\Http\Livewire\Front\Partials;

use App\Admin\Product;

use Livewire\Component;


class SmallCartView extends Component
{

    public $cart = [];
    public $total = 0;

    public $current_stock_variation_or_product;


    protected $listeners = [
        'add',
        'emptySmallCartProduct',
        'removeFromSmallCart',
        'updateCart',
        // 'add_to_cart_from_you_may_like' => 'add'
    ];
    public function mount()
    {
        if (session()->has('cart')) {
            $this->cart = session()->get('cart');
        }

        $this->total = collect($this->cart)->pluck('total')->sum();
        $this->flashMessage  = false;
    }
    public function render()
    {
        return view('livewire.front.partials.small-cart-view');
    }

    public function add($product, $quentity)
    {

        // $cartOverload  =  Product::with('stock')->find($product);
        // if ($cartOverload->stock->stock < $quentity) {
        //     $this->mount();
        //     $this->emit('cartOverload');
        //     return false;
        // }


        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }

        if (!isset($cart[$product])) {
            $cart[$product] = Product::find($product);
        }
        if (session()->get('variation')) {
            $this->current_stock_variation_or_product = session()->get('variation')->stock;
        } else {
            $this->current_stock_variation_or_product = $cart[$product]->stock->stock;
        }

        // dd($cart[$product]->quentity + $quentity);
        if ($this->current_stock_variation_or_product < $cart[$product]->quentity + $quentity) {
            if (session()->get('variation')) {
                $this->emit('cartOverload', ['type' => 'error', 'message' => '<h5> You have already cart Variation Product and its Stock is end. </h5>']);
            } else {

                $this->emit('cartOverload', ['type' => 'error', 'message' => '<h5> You Have select OverQuentity </h5>']);
            }
            $this->mount();
            return false;
        }
        $cart[$product]['quentity'] = $cart[$product]->quentity + $quentity;

        $quentity = $cart[$product]['quentity'];

        if (session()->has('variation')) {

            $variation = session()->get('variation');
            $cart[$product]['variation_details'] = $variation;

            if (!empty($variation['offer_price'])) {

                $price = $variation['offer_price'];
                $cart[$product]['price'] =  $variation['offer_price'];
            } else {

                $price = $variation['main_price'];
                $cart[$product]['price'] =  $variation['main_price'];
            }
        } else {
            $cart[$product]['variation_details'] = null;
            if (!empty($cart[$product]['offer_price'])) {

                $price = $cart[$product]['offer_price'];
                $cart[$product]['price'] = $cart[$product]['offer_price'];
            } else {

                $price = $cart[$product]['main_price'];
                $cart[$product]['price'] = $cart[$product]['main_price'];
            }
        }

        $cart[$product]['total'] = $price * $quentity;
        $cart[$product]['shipping_cost'] = $cart[$product]->shop->shipping;
        session()->put('cart', $cart);
        $this->cart = session()->get('cart');
        $this->total = collect($this->cart)->pluck('total')->sum();
        $this->emit('updateHeaderTwoCartNumber');
        $this->emit('addToCartToastMessage', ['type' => 'success', 'message' => '<h5> Product is added to cart </h5>']);
        session()->forget('variation');
    }




    public function emptySmallCartProduct()
    {
        $this->reset();
        $this->emit('resetCurtnumber');
    }

    // public function updateQuentity($product, $quentity)
    // {

    //     // $this->emit('updateQuentityOnCart', session()->get('cart'));
    // }

    public function removeFromSmallCart()
    {
        if (session()->has('cart')) {
            $this->cart = session()->get('cart');
        }

        $this->total = collect($this->cart)->pluck('total')->sum();
    }
    public function updateCart()
    {
        if (session()->has('cart')) {
            $this->cart = session()->get('cart');
        }

        $this->total = collect($this->cart)->pluck('total')->sum();
    }

    public function removeProduct($product)
    {

        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }
        if (isset($cart[$product])) {
            unset($cart[$product]);
        }
        session()->put('cart', $cart);
        $this->cart = session()->get('cart');
        $this->total = collect($this->cart)->pluck('total')->sum();
        $this->emit('removeFromSmallCartToUpdateCartPage');
    }
}
