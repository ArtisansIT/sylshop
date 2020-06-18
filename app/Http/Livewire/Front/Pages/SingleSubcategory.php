<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Subcategory;
use Livewire\Component;

class SingleSubcategory extends Component
{

    public $subcategory;

    public function mount(Subcategory $subcategory)
    {
        $this->subcategory = $subcategory;
    }
    public function render()
    {
        return view('livewire.front.pages.single-subcategory');
    }
}
