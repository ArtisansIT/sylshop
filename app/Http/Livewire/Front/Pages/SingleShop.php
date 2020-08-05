<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Shop;
use Livewire\Component;

class SingleShop extends Component
{

    public $shop;


    public function mount($shop)
    {
        $this->shop = Shop::with(
            [
                'products' => function ($q) {
                    $q->inRandomOrder()->get();
                },
                'subcategorys' => function ($q) {
                    $q->inRandomOrder()->get();
                },

                'image',
                'subcategorys.image',
                'products.image'
            ],
        )->findOrFail($shop);
        $this->viewCount();
    }
    public function render()
    {
        return view('livewire.front.pages.single-shop');
    }

    public function viewCount()
    {
        $this->shop->update([
            'view' => $this->shop->view + 1
        ]);
    }
}
