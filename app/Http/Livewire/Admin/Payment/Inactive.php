<?php

namespace App\Http\Livewire\Admin\Payment;

use App\Admin\Payment;
use Livewire\Component;

class Inactive extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.admin.payment.inactive', [

            'payments' => $this->search === null ?
                Payment::onlyTrashed()->get() :
                Payment::Where([
                    ['name', 'like', '%' . $this->search . '%'],
                ])->onlyTrashed()->get()

        ]);
    }

    public function restore($payment)
    {
        $this->emit('restore', $payment);
    }
    public function forceDelete($payment)
    {
        $this->emit('forceDelete', $payment);
    }
}
