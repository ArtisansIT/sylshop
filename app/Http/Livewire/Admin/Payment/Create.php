<?php

namespace App\Http\Livewire\Admin\Payment;

use App\Admin\Payment;
use Livewire\Component;

class Create extends Component
{
    public $goto_create_page;
    public $goto_in_activate_page;
    public $go_all_payment_page;
    public $go_edit_payment_page;

    public $selected_id;
    public $name;
    public $number;
    public $long_description;
    public $short_description;

    protected $listeners = [
        'editpayment',
        'inactivepayment',
        'restore',
        'forceDelete'
    ];


    public function mount()
    {
        $this->goto_create_page = true;

        $this->goto_in_activate_page = false;
        $this->go_all_payment_page = false;
        $this->go_edit_payment_page = false;
    }

    public function resetPage()
    {
        $this->goto_create_page = false;

        $this->goto_in_activate_page = false;
        $this->go_all_payment_page = false;
        $this->go_edit_payment_page = false;
    }
    public function render()
    {
        return view('livewire.admin.payment.create');
    }

    public function go_in_activate_page()
    {
        $this->resetPage();
        $this->goto_in_activate_page = true;
    }
    public function go_create_page()
    {
        $this->resetPage();
        $this->goto_create_page = true;
    }

    public function go_all_payment_page()
    {
        $this->resetPage();
        $this->go_all_payment_page = true;
    }

    public function createPickaup()
    {
        $this->validate([
            'name' => 'required',
            'number' => 'required|numeric',
            'long_description' => 'required',
            'short_description' => 'required',
        ]);

        Payment::create([
            'name' => $this->name,
            'number' => $this->number,
            's_details' => $this->long_description,
            'l_details' => $this->short_description,
        ]);


        session()->flash('message', " payment Create ");
        $this->name = '';
        $this->number = '';
        $this->long_description = '';
        $this->short_description = '';
    }

    public function editpayment($payment)
    {
        $this->resetPage();
        $this->go_edit_payment_page = true;


        $record = Payment::findOrFail($payment);
        $this->selected_id = $payment;

        $this->name = $record->name;
        $this->number = $record->number;
        $this->long_description = $record->l_details;
        $this->short_description = $record->s_details;
    }


    public function update()
    {
        $this->validate([
            'name' => 'required',
            'number' => 'required|numeric',
            'long_description' => 'required',
            'short_description' => 'required',
        ]);
        if ($this->selected_id) {
            $record = Payment::findOrFail($this->selected_id);
            $record->update([
                'name' => $this->name,
                'number' => $this->number,
                's_details' => $this->long_description,
                'l_details' => $this->short_description,

            ]);

            session()->flash('update', " payment update ");

            $this->resetPage();
            $this->go_all_payment_page = true;
        }
    }

    public function inactivepayment($payment)
    {
        Payment::findOrFail($payment)->delete();
        $this->resetPage();
        $this->goto_in_activate_page = true;
        session()->flash('Inactive', " payment In active ");
    }

    public function restore($payment)
    {
        Payment::where('id', $payment)->onlyTrashed()->first()->restore();
        session()->flash('update', " payment In active ");
        $this->resetPage();
        $this->go_all_payment_page = true;
    }
    public function forceDelete($payment)
    {

        $data = Payment::where('id', $payment)->onlyTrashed()->first();
        session()->flash('Inactive', " payment Deleted ");
        $data->forceDelete();
        $this->resetPage();
        $this->go_all_payment_page = true;
    }
}
