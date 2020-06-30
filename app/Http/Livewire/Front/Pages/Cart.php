<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Coupane;
use App\Admin\Order;
use App\Admin\Payment;
use App\Admin\Product;
use App\Admin\Stock;
use App\Admin\userordercoupane;
use App\Admin\Variation;
use Livewire\Component;


class Cart extends Component
{
    public $cart = [];
    public $total = 0;
    public $grandTotal;
    public $shipping_cost;
    public $total_with_shiping;
    public $discount = 0;
    public $coupane = null;
    public $currentPickup;

    public $name;
    public $mobile;
    public $distric;
    public $address;

    public $current_global_stock_variable;
    public $shopping_with_Coin = false;








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
        if ($cart[$product]['variation_details'] !== null) {
            $this->current_global_stock_variable = $cart[$product]['variation_details']->stock;
            // dd($this->current_global_stock_variable);
        } else {
            $this->current_global_stock_variable = $cart[$product]->stock->stock;
        }
        // dd($cart[$product]['variation_details']);
        if ($quentity > $this->current_global_stock_variable) {
            $this->emit(
                'overUpdateCartQuentity',
                ['type' => 'error', 'message' => '<h5> You Have select OverQuentity </h5>']
            );
            $this->mount();
            return false;
        }

        if ($this->current_global_stock_variable <=  $cart[$product]['quentity']) {


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
        // dd($this->cart);

        $currentUser =  Auth()->user()->id;
        $orderNo = rand(1, 9999) . $currentUser;
        if (empty($payment['pickup_id']) && empty($payment['address'])) {
            $this->emit(
                'on_address_no_pickup',
                ['type' => 'error', 'message' => '<h5> Address Or Pickup station must select </h5>']
            );

            $this->mount();
            return false;
        }
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

            // dd($pro);

            $currentorder->details()->create([
                'product_id' => $pro['id'],
                'variation_id' => $pro['variation_details']['id'],
                'price' => $pro['price'],
                'total' => $pro['total'],
                'quentity' => $pro['quentity'],
            ]);

            $stock = Stock::where('product_id', $pro['id'])->first();

            if (!empty($pro['variation_details'])) {
                $this->Order_variation_stock_reduce($pro['variation_details']['id'], $pro['quentity']);

                $stock->variation_stock = $stock->variation_stock - $pro['quentity'];
                $stock->save();
            } else {
                $stock->stock = $stock->stock - $pro['quentity'];
                $stock->save();
            }

            if (!empty($this->coupane)) {
                if (
                    !empty($this->coupane->user_id)
                    || !empty($this->coupane->coin)
                ) {
                    $this->shopping_with_Coin = true;
                }

                userordercoupane::create([
                    'user_id' => $currentUser,
                    'order_id' => $currentorder->id,
                    'coupane_id' => $this->coupane->id,
                    'purches_with_coin_status' => $this->shopping_with_Coin,

                ]);
            }
        }

        $this->mount();
        if (session()->has('cart')) {
            session()->forget(['cart']);
            $this->reset();
        }
        return redirect()->route('user.dashboard');
    }

    public function Order_variation_stock_reduce($variation_id, $quentity)
    {
        $variation = Variation::findOrFail($variation_id);
        $variation->stock = $variation->stock - $quentity;
        $variation->save();
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


    public function coupaneActive($discount, $coupane_id)
    {
        $this->discount = $discount;
        $this->coupane = Coupane::findOrFail($coupane_id);
        $this->cart = session()->get('cart');
        // $this->grandTotal = collect($this->cart)->pluck('total')->sum() - $this->discount;
        $this->grandTotal = $this->clculateGrandtotal();
    }
}
