<?php

namespace App\Http\Livewire\Admin\Citems;

use App\Admin\Citem;
use Livewire\Component;

class Create extends Component
{

    public $goto_create_page;
    public $goto_in_activate_page;
    public $go_all_citem_page;
    public $go_edit_citem_page;

    public $selected_id;
    public $name;

    protected $listeners = [
        'editcitem',
        'inactivecitem',
        'restore',
        'forceDelete'
    ];

    public function mount()
    {
        $this->goto_create_page = true;

        $this->goto_in_activate_page = false;
        $this->go_all_citem_page = false;
        $this->go_edit_citem_page = false;
    }

    public function resetPage()
    {
        $this->goto_create_page = false;

        $this->goto_in_activate_page = false;
        $this->go_all_citem_page = false;
        $this->go_edit_citem_page = false;
    }
    public function render()
    {
        return view('livewire.admin.citems.create');
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

    public function go_all_citem_page()
    {
        $this->resetPage();
        $this->go_all_citem_page = true;
    }

    public function createPickaup()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Citem::create([
            'name' => $this->name,
        ]);


        session()->flash('message', " Comment Item Create ");
        $this->name = '';
    }

    public function editcitem($citem)
    {
        $this->resetPage();
        $this->go_edit_citem_page = true;


        $record = Citem::findOrFail($citem);
        $this->selected_id = $citem;

        $this->name = $record->name;
        $this->number = $record->number;
        $this->long_description = $record->l_details;
        $this->short_description = $record->s_details;
    }


    public function update()
    {
        $this->validate([
            'name' => 'required',

        ]);
        if ($this->selected_id) {
            $record = Citem::findOrFail($this->selected_id);
            $record->update([
                'name' => $this->name,
            ]);

            session()->flash('update', " Comment Item update ");

            $this->resetPage();
            $this->go_all_citem_page = true;
        }
    }

    public function inactivecitem($citem)
    {
        Citem::findOrFail($citem)->delete();
        $this->resetPage();
        $this->goto_in_activate_page = true;
        session()->flash('Inactive', " citem In active ");
    }

    public function restore($citem)
    {
        Citem::where('id', $citem)->onlyTrashed()->first()->restore();
        session()->flash('update', " Comment Item In active ");
        $this->resetPage();
        $this->go_all_citem_page = true;
    }
    public function forceDelete($citem)
    {

        $data = Citem::where('id', $citem)->onlyTrashed()->first();
        session()->flash('Inactive', " Comment Item Deleted ");
        $data->forceDelete();
        $this->resetPage();
        $this->go_all_citem_page = true;
    }
}
