<?php

namespace App\Http\Livewire\Admin\Product;

use App\Admin\Product;
use Livewire\Component;

class Inactiveproduct extends Component
{

    public $search;
    public function render()
    {
        return view('livewire.admin.product.inactiveproduct', [

            'products' => $this->search === null ?
                // Subcategory::where('status', true)->onlyTrashed()->get() :
                // Subcategory::where('name', 'like', '%' . $this->search . '%')->onlyTrashed()->get()

                Product::where([

                    ['status', true],
                ])->onlyTrashed()->get() :
                Product::Where([
                    ['name', 'like', '%' . $this->search . '%'],
                    ['status', true],
                ])->onlyTrashed()->get()

        ]);
    }

    public function restore_product($product)
    {
        $this->emit('restore_product', $product);
    }
    public function forceDelete_product($product)
    {
        $this->emit('forceDelete_product', $product);
    }
}
