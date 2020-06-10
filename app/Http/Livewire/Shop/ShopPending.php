<?php

namespace App\Http\Livewire\Shop;

use App\Admin\Shop;
use Livewire\Component;

class ShopPending extends Component
{
    public $search;

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.shop.shop-pending', [
            'shops' => $this->search === null ?
                Shop::doesntHave('image')
                ->where([
                    ['deleted_at', null],
                    ['status', false],


                ])->get() :
                Shop::doesntHave('image')
                ->where([
                    ['deleted_at', null],
                    ['status', false],
                    ['name', 'like', '%' . $this->search . '%']
                ])
                ->get()
        ]);
    }

    public function pendingImage($shop)
    {
        $this->emit('pendingImage', $shop);
    }
}
