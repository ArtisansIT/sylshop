<?php

namespace App\Http\Livewire\Admin\Userwithcoupane;

use App\Admin\Coupane;
use Livewire\Component;

class AddCoupaneToUser extends Component
{
    public $coupans;
    public $selectedCoupane;
    public $user;

    protected $listeners = [
        'addCoinToUser',

    ];



    public function mount()
    {
        $this->coupans = Coupane::where([
            ['coin', '!=', null],
            ['user_id', null],
        ])->get();
    }

    public function render()
    {
        return view('livewire.admin.userwithcoupane.add-coupane-to-user');
    }

    public function addCoinToUser($user)
    {
        $this->user = $user; // user id send from admin.userwithcoupane.user componetn

    }

    public function submitCoupane()
    {
        $this->validate([
            'selectedCoupane' => 'required'
        ]);
        $record = Coupane::findOrFail($this->selectedCoupane);
        $record->update([
            'user_id' => $this->user
        ]);

        $this->emit('backToMainComponent');
    }
}
