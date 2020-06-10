<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Category;
use Livewire\Component;

class SingleCategory extends Component

{

    public $categorys;

    public function mount(Category $category)
    {
        // $data = Category::findOrFail($category);
        $this->categorys = $category;
    }
    public function render()
    {
        return view('livewire.front.pages.single-category');
    }
}
