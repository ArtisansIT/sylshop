<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Shop;
use Livewire\Component;


class ShopList extends Component
{
    public $shops;

    protected $listeners = [
        'loadMore'
    ];

    public function mount()
    {
        $this->shops = Shop::with('image', 'category')
            ->where('status', true)
            ->get();
    }
    public function render()
    {
        return view('livewire.front.pages.shop-list');
    }

    public function loadMore()
    {
        $this->mount();
    }
}
