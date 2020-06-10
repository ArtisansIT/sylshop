<?php

namespace App\Http\Livewire\Admin\Pickup;

use App\Admin\Pickup;
use Livewire\Component;

class Inactive extends Component
{

    public $search;
    public function render()
    {
        return view('livewire.admin.pickup.inactive', [

            'pickups' => $this->search === null ?
                Pickup::onlyTrashed()->get() :
                Pickup::Where([
                    ['address', 'like', '%' . $this->search . '%'],
                ])->onlyTrashed()->get()

        ]);
    }

    public function restore($pickup)
    {
        $this->emit('restore', $pickup);
    }
    public function forceDelete($pickup)
    {
        $this->emit('forceDelete', $pickup);
    }
}
