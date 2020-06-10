<?php

namespace App\Http\Livewire\Admin\Category;

use App\Admin\Category;
use Livewire\Component;

class InactiveCategory extends Component
{

    public $search;
    public function render()
    {
        return view('livewire.admin.category.inactive-category', [

            'categorys' => $this->search === null ?
                // Subcategory::where('status', true)->onlyTrashed()->get() :
                // Subcategory::where('name', 'like', '%' . $this->search . '%')->onlyTrashed()->get()

                Category::onlyTrashed()->get() :
                Category::Where([
                    ['name', 'like', '%' . $this->search . '%']
                ])->onlyTrashed()->get()

        ]);
    }

    public function restore($category)
    {
        $this->emit('restore', $category);
    }
    public function forceDelete($category)
    {
        $this->emit('forceDelete', $category);
    }
}
