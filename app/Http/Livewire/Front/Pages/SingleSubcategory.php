<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Subcategory;
use Livewire\Component;

class SingleSubcategory extends Component
{

    public $subcategory;

    public function mount($subcategory)
    {

        $this->subcategory  = Subcategory::with(
            [
                'products' => function ($q) {
                    $q->inRandomOrder()->get();
                },
                'products.image'
            ],
        )->findOrFail($subcategory);
    }
    public function render()
    {
        return view('livewire.front.pages.single-subcategory');
    }
}
