<?php


namespace App\Helpers;

use App\Admin\Product;

class Cart
{



    public function __construct()
    {
        if ($this->get() === null)
            $this->set($this->empty());
    }

    public function add($product, $quantity)
    {


        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }
        if (!isset($cart[$product])) {
            $cart[$product] = Product::find($product);
        }
        $cart[$product]['quantity'] = $cart[$product]->quantity + $quantity;
        $quantity = $cart[$product]['quantity'];
        $price = $cart[$product]['main_price'];
        $cart[$product]['total'] = $price * $quantity;
        $this->set($cart);
        $this->get();
        // $this->cart = session()->get('cart');
        $this->total();
    }

    public function remove($productId)
    {
        $cart = $this->get();
        array_splice($cart['products'], array_search($productId, array_column($cart['products'], 'id')), 1);
        $this->set($cart);
    }
    public function clear()
    {
        $this->set($this->empty());
    }

    public function empty()
    {
        return [
            'products' => [],
        ];
    }

    public function get()
    {
        return request()->session()->get('cart');
    }

    private function set($cart)
    {
        request()->session()->put('cart', $cart);
    }
    public function total()
    {
        return  collect($this->get())->pluck('total')->sum();
    }
}
