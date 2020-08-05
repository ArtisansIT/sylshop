<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Category;
use Livewire\Component;

class SingleCategory extends Component

{

    public $categorys;

    public function mount($category)
    {

        // $data = Category::findOrFail($category);
        $this->categorys  = Category::with(
            [
                'products' => function ($q) {
                    $q->inRandomOrder()->get();
                },
                'products.image'
            ],
        )->findOrFail($category);
        // $this->categorys = $category;
    }
    public function render()
    {
        return view('livewire.front.pages.single-category');
    }
}
