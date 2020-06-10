<?php

namespace App\Http\Livewire\Shop;

use App\Admin\Shop;
use Livewire\Component;

class Inactive extends Component
{

    public $search;

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.shop.inactive', [

            'shops' => $this->search === null ?
                // Subcategory::where('status', true)->onlyTrashed()->get() :
                // Subcategory::where('name', 'like', '%' . $this->search . '%')->onlyTrashed()->get()

                Shop::where([

                    ['status', true],
                ])->onlyTrashed()->get() :
                Shop::Where([
                    ['name', 'like', '%' . $this->search . '%'],
                    ['status', true],
                ])->onlyTrashed()->get()

        ]);
    }

    public function restore_shop($shop)
    {
        $this->emit('restore_shop', $shop);
    }
    public function forceDelete_shop($shop)
    {
        $this->emit('forceDelete_shop', $shop);
    }
}
