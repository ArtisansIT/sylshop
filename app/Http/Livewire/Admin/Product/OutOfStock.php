<?php

namespace App\Http\Livewire\Admin\Product;

use App\Admin\Product;
use Livewire\Component;

class OutOfStock extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.admin.product.out-of-stock', [
            'products' => $this->search === null ?
                Product::with(
                    'image',
                    'category:id,name',
                    'subcategory:id,name',
                    'shop:id,name',

                )
                ->whereHas('adons', function ($q) {
                    $q->where('outofstock', true);
                })->where('status', true)
                ->get() :
                Product::whereHas('adons', function ($q) {
                    $q->where('outofstock', true);
                })->where([
                    ['status', true],
                    ['name', 'like', '%' . $this->search . '%'],

                ])->orWhere([
                    ['status', true],
                    ['code', 'like', '%' . $this->search . '%'],
                ])->get()
        ]);
    }

    public function activation_stock($id)
    {
        $data = Product::with('adons')->findOrFail($id);
        $data->adons->update([
            'outofstock' => false
        ]);
    }
}
