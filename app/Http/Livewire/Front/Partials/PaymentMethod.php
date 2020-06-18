<?php

namespace App\Http\Livewire\Front\Partials;

use App\Admin\Payment;
use Livewire\Component;

class PaymentMethod extends Component
{

    public $payments;
    public $paymentOption;
    public $paymentField_address;
    public $paymentField_pickup;
    public $address_section_active;
    public $pickup_section_active;
    public $orderDetails = [
        'name' => '',
        'mobile' => '',
        'pickup_id' => null,
        'address' => '',
        'paymentOption' => '',
    ];


    protected $listeners = [

        'changePickupValue'
    ];

    public function mount()
    {
        $this->payments = Payment::all();
        $this->orderDetails['name'] = auth()->user()->name;
        $this->orderDetails['mobile'] = auth()->user()->phone;
        $this->paymentField_address = true;
        $this->paymentField_pickup = true;
        $this->address_section_active = false;
        $this->pickup_section_active = false;
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
        ]);
        $this->emit('confirmOrder', $this->orderDetails);
    }


    public function changePickupValue($pickup)
    {

        $this->orderDetails['pickup_id'] = $pickup['id'];
    }

    public function address_button_click()
    {
        $this->paymentField_address = false;
        $this->address_section_active = true;
        $this->paymentField_pickup = true;
    }

    public function pickup_button_click()
    {
        $this->paymentField = true;
        $this->address_section_active = false;
    }
}
