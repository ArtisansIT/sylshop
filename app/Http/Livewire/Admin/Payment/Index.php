<?php

namespace App\Http\Livewire\Admin\Payment;

use App\Admin\Payment;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.admin.payment.index', [
            'payments' => $this->search === null ?
                Payment::where([
                    ['deleted_at', null],
                ])->get() :
                Payment::where([
                    ['name', 'like', '%' . $this->search . '%'],
                    ['deleted_at', null],
                ])->get()
        ]);
    }

    public function editpayment($payment)
    {
        $this->emit('editpayment', $payment);
    }

    public function inactivepayment($payment)
    {
        $this->emit('inactivepayment', $payment);
    }
}
