<?php

namespace App\Http\Livewire;

use App\Admin\Shop;
use Livewire\Component;

class pendingShop extends Component
{

    

    public function render()
    {
        return view('livewire.shop.pending-shop',[
            'shops' =>  Shop::where('status', false)->get(),
        ]);
    }

    public function mount()
    {
      
    }

    
}
