<?php

namespace App\Http\Livewire\Admin\Category;

use App\Admin\Category;
use Livewire\Component;

class CategoryIndex extends Component
{


    public function render()
    {
        return view('livewire.admin.category.category-index', [
            'categorys' => Category::allCategory(),
        ]);
    }

    public function updateTitle($id, $name)
    {
        $data = Category::find($id);
        $data->name = $name;
        $data->save();
    }


    public function deleteCategory($id)
    {
        $data = Category::find($id);
        // \File::delete('images/'.$data->image->url);
        $data->delete();
    }

    public function updateImage($category)
    {
        $this->emitTo('Admin.Category.Create', 'category_image_update', $category);
    }
}
