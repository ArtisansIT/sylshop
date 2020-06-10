<?php

namespace App\Http\Livewire\Admin\Product;

use App\Admin\Product;
use Livewire\Component;

class AllProduct extends Component
{

    public $search;
    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {


        return view('livewire.admin.product.all-product', [
            'products' => $this->search === null ?
                Product::where([
                    ['deleted_at', null],
                    ['status', true],

                ])->get() :
                Product::whereHas('category', function ($query) {
                    $query->where([
                        ['name', 'like', '%' . $this->search . '%'],
                        ['deleted_at', null],
                        ['status', true],
                    ]);
                })
                ->where([
                    ['name', 'like', '%' . $this->search . '%'],
                    ['deleted_at', null],
                    ['status', true],
                ])->get()
        ]);
    }

    public function edit_product($product)
    {
        $this->emit('edit_product', $product);
    }
    public function see_all_image($product)
    {
        $this->emit('see_all_image', $product);
    }

    public function go_and_update_stock($product)
    {
        $this->emit('go_and_update_stock', $product);
    }

    public function softDelete_product($product)
    {
        $this->emit('softDelete_product', $product);
    }

    public function addToOffer($product)
    {


        $data = Product::findOrFail($product);
        $data->adons->today_offer = !$data->adons->today_offer;
        $data->adons->save();
    }

    public function allVariation($product)
    {
        $this->emit('allVariation', $product);
    }
}
