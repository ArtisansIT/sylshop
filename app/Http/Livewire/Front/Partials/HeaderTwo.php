<?php

namespace App\Http\Livewire\Front\Partials;

use App\Admin\Shop;
use App\Facades\Cart;
use App\Admin\Category;
use Livewire\Component;

class HeaderTwo extends Component
{



    // protected $listeners = [];
    public function render()
    {
        return view('livewire.front.partials.header-two', [
            'categorys' => Category::with(['shop', 'shop.subcategorys'])
                ->get(),
            'shops' => Shop::with('subcategorys')->where('status', true)->get()
        ]);
    }
}
