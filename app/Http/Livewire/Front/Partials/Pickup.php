<?php

namespace App\Http\Livewire\Front\Partials;

use App\Admin\Pickup as AdminPickup;
use Livewire\Component;

class Pickup extends Component
{
    public $pickups;
    public $pickup_id;
    public function mount()
    {
        $this->pickups = AdminPickup::all();
    }
    public function render()
    {
        return view('livewire.front.partials.pickup');
    }

    public function changePickup()
    {
        // if (empty($this->pickup_id)) {
        //     return false;
        // }
        $data = AdminPickup::find($this->pickup_id);
        $this->emit('changePickupValue', $data);
    }
}
