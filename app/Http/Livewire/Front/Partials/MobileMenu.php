<?php

namespace App\Http\Livewire\Front\Partials;

use App\Admin\Category;
use Livewire\Component;

class MobileMenu extends Component
{
    public function render()
    {
        return view('livewire.front.partials.mobile-menu', [
            'categorys' => Category::with('subcategorys:id,name')->cursor(),


        ]);
    }
}
