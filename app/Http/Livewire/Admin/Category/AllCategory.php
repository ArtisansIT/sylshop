<?php

namespace App\Http\Livewire\Admin\Category;

use App\Admin\Category;
use Livewire\Component;

class AllCategory extends Component
{

    public $search;


    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.admin.category.all-category', [
            'categorys' => $this->search === null ?
                Category::where([
                    ['deleted_at', null],
                ])->get() :
                Category::where('name', 'like', '%' . $this->search . '%')->get()
        ]);
    }

    public function updateTitle($category)
    {
        $this->emit('updateTitle', $category);
    }

    public function deleteCategory($category)
    {
        $this->emit('deleteCategory', $category);
    }
    public function updateImage($category)
    {
        $this->emit('updateImage', $category);
    }

    public function addToPopular($category)
    {
        $data = Category::findOrFail($category);
        $data->update([
            'popular' => !$data->popular,
        ]);
    }
}
