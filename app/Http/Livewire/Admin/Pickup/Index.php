<?php

namespace App\Http\Livewire\Admin\Pickup;

use App\Admin\Pickup;
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
        return view('livewire.admin.pickup.index', [
            'pickups' => $this->search === null ?
                Pickup::where([
                    ['deleted_at', null],
                ])->get() :
                Pickup::where([
                    ['address', 'like', '%' . $this->search . '%'],
                    ['deleted_at', null],
                ])->get()
        ]);
    }

    public function editpickup($pickup)
    {
        $this->emit('editpickup', $pickup);
    }

    public function inactivepickup($pickup)
    {
        $this->emit('inactivepickup', $pickup);
    }
}
