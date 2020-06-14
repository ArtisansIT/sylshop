<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Shop;
use Livewire\Component;

class SingleShop extends Component
{

    public $shop;


    public function mount(Shop $shop)
    {
        $this->shop = $shop;
        // dd($this->shop);
    }
    public function render()
    {
        return view('livewire.front.pages.single-shop');
    }
}
