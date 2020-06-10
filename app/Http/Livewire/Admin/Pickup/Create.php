<?php

namespace App\Http\Livewire\Admin\Pickup;

use App\Admin\Pickup;
use Livewire\Component;

class Create extends Component
{

    public $goto_create_page;
    public $goto_in_activate_page;
    public $go_all_pickup_page;
    public $go_edit_pickup_page;

    public $selected_id;
    public $cost;
    public $address;

    protected $listeners = [
        'editpickup',
        'inactivepickup',
        'restore',
        'forceDelete'
    ];


    public function mount()
    {
        $this->goto_create_page = true;

        $this->goto_in_activate_page = false;
        $this->go_all_pickup_page = false;
        $this->go_edit_pickup_page = false;
    }

    public function resetPage()
    {
        $this->goto_create_page = false;

        $this->goto_in_activate_page = false;
        $this->go_all_pickup_page = false;
        $this->go_edit_pickup_page = false;
    }
    public function render()
    {
        return view('livewire.admin.pickup.create');
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

    public function go_all_pickup_page()
    {
        $this->resetPage();
        $this->go_all_pickup_page = true;
    }

    public function createPickaup()
    {
        $this->validate([
            'address' => 'required',
            'cost' => 'required',
        ]);

        Pickup::create([
            'address' => $this->address,
            'cost' => $this->cost,
        ]);

        session()->flash('message', " Pickup Create ");
        $this->cost = '';
        $this->address = '';
    }

    public function editpickup($pickup)
    {
        $this->resetPage();
        $this->go_edit_pickup_page = true;


        $record = Pickup::findOrFail($pickup);
        $this->selected_id = $pickup;

        $this->address = $record->address;
        $this->cost = $record->cost;
    }


    public function update()
    {
        $this->validate([
            'address' => 'required',
            'cost' => 'required',

        ]);
        if ($this->selected_id) {
            $record = Pickup::findOrFail($this->selected_id);
            $record->update([
                'address' => $this->address,
                'cost' => $this->cost,

            ]);

            session()->flash('update', " Pickup update ");

            $this->resetPage();
            $this->go_all_pickup_page = true;
        }
    }

    public function inactivepickup($pickup)
    {
        Pickup::findOrFail($pickup)->delete();
        session()->flash('Inactive', " Pickup In active ");
        $this->resetPage();
        $this->goto_in_activate_page = true;
    }

    public function restore($pickup)
    {
        Pickup::where('id', $pickup)->onlyTrashed()->first()->restore();
        $this->resetPage();
        $this->go_all_pickup_page = true;
    }
    public function forceDelete($pickup)
    {

        $data = Pickup::where('id', $pickup)->onlyTrashed()->first();
        $data->forceDelete();
        $this->resetPage();
        $this->go_all_pickup_page = true;
    }
}
