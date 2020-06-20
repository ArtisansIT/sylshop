<?php

namespace App\Http\Livewire\Admin\Category;

use App\Admin\Category;
use App\Admin\Shop;
use Livewire\Component;

class Create extends Component
{
    public $goto_create_page;
    public $goto_image_page;
    public $goto_in_actiove_page;
    public $go_all_category_page;
    public $go_edit_category_page;

    public $selected_id;
    public $name;

    protected $listeners = [

        'category_image_update',
        'updateTitle',
        'deleteCategory',
        'restore',
        'forceDelete',
        'updateImage',
        'submitImage'



    ];

    public function mount()
    {
        $this->goto_create_page = true;
        $this->goto_image_page = false;
        $this->goto_in_actiove_page = false;
        $this->go_all_category_page = false;
        $this->go_edit_category_page = false;
    }

    public function resetPage()
    {
        $this->goto_create_page = false;
        $this->goto_image_page = false;
        $this->goto_in_actiove_page = false;
        $this->go_all_category_page = false;
        $this->go_edit_category_page = false;
    }

    public function render()
    {
        return view('livewire.admin.category.create');
    }

    public function go_in_actiove_page()
    {
        $this->resetPage();
        $this->goto_in_actiove_page = true;
    }
    public function go_create_page()
    {
        $this->resetPage();
        $this->goto_create_page = true;
    }

    public function category_image_update($category)
    {
        $this->resetPage();
        $this->goto_create_page = true;
    }
    public function go_all_category_page()
    {
        $this->resetPage();
        $this->go_all_category_page = true;
    }

    public function updateTitle($category)
    {
        $record = Category::findOrFail($category);

        $this->selected_id = $category;
        $this->name = $record->name;
        $this->resetPage();
        $this->go_edit_category_page = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',

        ]);
        if ($this->selected_id) {
            $record = Category::findOrFail($this->selected_id);
            $record->update([
                'name' => $this->name,

            ]);

            $this->resetPage();
            $this->go_all_category_page = true;
        }
    }

    public function deleteCategory($category)
    {
        Category::findOrFail($category)->delete();
        $this->resetPage();
        $this->goto_in_actiove_page = true;
    }
    public function restore($category)
    {
        Category::where('id', $category)->onlyTrashed()->first()->restore();
        $this->resetPage();
        $this->go_all_category_page = true;
    }
    public function forceDelete($category)
    {
        $shops = Shop::onlyTrashed()->where('category_id', $category)->get();

        if ($shops->count() <= 0) {

            $data = Category::where('id', $category)->onlyTrashed()->first();
            \File::delete('images/' . $data->image->url);
            $data->image()->delete();
        } else {
            session()->flash('message', 'Can not Delete category , 
            First Delete all shop.');
            return redirect()->route('admin.category_create');
        }

        $data->forceDelete();
        $this->resetPage();
        $this->go_all_category_page = true;
    }

    public function updateImage($category)
    {

        $this->selected_id = $category;

        $this->resetPage();
        $this->goto_image_page = true;
    }
}
