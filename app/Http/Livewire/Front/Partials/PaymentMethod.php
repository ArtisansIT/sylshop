<?php

namespace App\Http\Livewire\Front\Partials;

use App\Admin\Payment;
use Livewire\Component;

class PaymentMethod extends Component
{

    public $payments;
    public $paymentOption;
    public $orderDetails = [
        'name' => '',
        'mobile' => '',
        'pickup_id' => null,
        'address' => '',
        'paymentOption' => '',
    ];


    protected $listeners = [

        'changePickupValue',



    ];

    public function mount()
    {
        $this->payments = Payment::all();
        $this->orderDetails['name'] = auth()->user()->name;
        $this->orderDetails['mobile'] = auth()->user()->phone;
    }
    public function render()
    {
        return view('livewire.front.partials.payment-method');
    }

    public function confirmOrder()
    {


        $this->validate([
            'orderDetails.paymentOption' => 'required|numeric',
            'orderDetails.mobile' => 'required',
            'orderDetails.name' => 'required',
            'orderDetails.address' => 'required',
        ]);
        $this->emit('confirmOrder', $this->orderDetails);
    }


    public function changePickupValue($pickup)
    {

        $this->orderDetails['pickup_id'] = $pickup['id'];
    }
}
