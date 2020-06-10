<?php

namespace App\Http\Livewire\Admin\Subcategory;

use Livewire\Component;
use App\Admin\Subcategory;

class Inactive extends Component
{

    public $search;

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.admin.subcategory.inactive', [

            'subcategories' => $this->search === null ?
                Subcategory::where('status', true)->onlyTrashed()->get() :
                Subcategory::where('name', 'like', '%' . $this->search . '%')->onlyTrashed()->get()



        ]);
    }

    public function restore($subcategory)
    {
        $this->emit('restore', $subcategory);
    }
    public function forceDelete($subcategory)
    {
        $this->emit('forceDelete', $subcategory);
    }
}
