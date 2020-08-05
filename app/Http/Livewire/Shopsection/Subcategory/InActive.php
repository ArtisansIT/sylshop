<?php

namespace App\Http\Livewire\Shopsection\Subcategory;

use Livewire\Component;
use App\Admin\Subcategory;

class InActive extends Component
{
    public $search;

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.shopsection.subcategory.in-active', [

            'subcategories' => $this->search === null ?
                Subcategory::where('status', true)->onlyTrashed()->get() :
                Subcategory::where('name', 'like', '%' . $this->search . '%')->onlyTrashed()->get()
        ]);
    }

    public function restore($subcategory)
    {
        $this->emit('SCFSSrestore', $subcategory);
    }
    public function forceDelete($subcategory)
    {
        $this->emit('SCFSSforceDelete', $subcategory);
    }
}
