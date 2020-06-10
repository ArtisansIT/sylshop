<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Order;
use App\Admin\Payment;
use App\Admin\Product;

use Livewire\Component;


class Cart extends Component
{
    public $cart = [];
    public $total = 0;
    public $grandTotal;
    public $shipping_cost;
    public $total_with_shiping;
    public $discount = 0;
    public $currentPickup;

    public $name;
    public $mobile;
    public $distric;
    public $address;








    protected $listeners = [
        'emptyCart',
        'updateQuentityOnCart',
        // 'updateQuentity',
        'removeFromSmallCartToUpdateCartPage' => 'mount',
        'coupaneActive',
        'changePickupValue',
        'confirmOrder'



    ];
    public function mount()
    {


        if (session()->has('cart')) {
            $this->cart = session()->get('cart');
        }

        $this->sub_shipping_total();
        $this->grandTotal = $this->clculateGrandtotal();
    }

    public function calculate_total()
    {
        return collect($this->cart)->pluck('total')->sum();
    }
    public function calculate_shipping_cast()
    {
        if (!empty($this->cart) && !empty($this->currentPickup)) {

            return $this->currentPickup['cost'];
        } else {

            return collect($this->cart)->unique('shop_id')->pluck('shipping_cost')->sum();
        }
    }

    public function sub_shipping_total()
    {

        $this->shipping_cost = $this->calculate_shipping_cast();
        $this->total = $this->calculate_total();
        $this->total_with_shiping = $this->total + $this->shipping_cost;
    }
    public function changePickupValue($pickup)
    {
        $this->currentPickup = $pickup;
        $this->mount();
    }

    public function render()
    {
        return view('livewire.front.pages.cart', [
            'payments' => Payment::all()
        ]);
    }

    public function emptyCart()
    {
        $this->emit('emptySmallCartProduct');
        if (session()->has('cart')) {
            session()->forget(['cart']);
            $this->reset();
        }
    }



    public function updateQuentity($product, $quentity)
    {


        if ($quentity == 0) {

            $this->mount();
            return false;
        }

        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }
        if (!isset($cart[$product])) {
            $cart[$product] = Product::find($product);
        }
        if ($quentity > $cart[$product]->stock->stock) {
            $this->emit(
                'overUpdateCartQuentity',
                ['type' => 'error', 'message' => '<h5> You Have select OverQuentity </h5>']
            );
            $this->mount();
            return false;
        }

        if ($cart[$product]->stock->stock <=  $cart[$product]['quentity']) {


            return  $this->recalculate($cart, $product, $quentity);
        }

        $this->quentityupdateInCartPage($cart, $product, $quentity);
    }

    public function recalculate($cart, $product, $qty)
    {

        if ($qty <= $cart[$product]->quentity) {
            $this->quentityupdateInCartPage($cart, $product, $qty);
        } else {
            $this->emit(
                'overUpdateCartQuentity',
                ['type' => 'error', 'message' => '<h5> You Have select OverQuentity </h5>']
            );
            $this->mount();
            return false;
        }
    }

    public function quentityupdateInCartPage($cart, $product, $quentity)
    {
        $cart[$product]['quentity'] =  $quentity;

        $quentity = $cart[$product]['quentity'];
        $price = $cart[$product]['price'];


        $cart[$product]['total'] = $price * $quentity;


        session()->put('cart', $cart);
        $this->cart = session()->get('cart');

        // $this->cart = session()->get('cart');
        $this->sub_shipping_total();
        $this->grandTotal = '';
        $this->discount = 0;

        $this->emit('updateCart');
    }

    public function confirmOrder($payment)
    {


        $currentUser =  Auth()->user()->id;
        $orderNo = rand(1, 9999) . $currentUser;
        $currentorder = Order::create([
            'user_id' => $currentUser,
            'code' => $orderNo,
            'shipping' => $this->shipping_cost,
            'discount' => $this->discount,
            'payment_id' => $payment['paymentOption'],
            'name' => $payment['name'],
            'pickup_id' => $payment['pickup_id'],
            'mobile' => $payment['mobile'],
            'address' => $payment['address'],
        ]);
        foreach ($this->cart as $pro) {

            $currentorder->details()->create([
                'product_id' => $pro['id'],
                'price' => $pro['price'],
                'total' => $pro['total'],
                'quentity' => $pro['quentity'],
            ]);
        }
        $this->mount();
        if (session()->has('cart')) {
            session()->forget(['cart']);
            $this->reset();
        }
        return redirect()->route('front.dashboard');
    }







    public function removeFromCart($productId)
    {

        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }
        session()->put('cart', $cart);
        $this->cart = session()->get('cart');
        $this->sub_shipping_total();
        $this->grandTotal = $this->clculateGrandtotal();
        $this->emit('removeFromSmallCart');
    }

    public function clculateGrandtotal()
    {
        return  $this->calculate_total() + $this->calculate_shipping_cast() - $this->discount;
    }


    public function coupaneActive($discount)
    {
        $this->discount = $discount;
        $this->cart = session()->get('cart');
        // $this->grandTotal = collect($this->cart)->pluck('total')->sum() - $this->discount;
        $this->grandTotal = $this->clculateGrandtotal();
    }
}
