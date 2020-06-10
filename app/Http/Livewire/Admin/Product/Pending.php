<?php

namespace App\Http\Livewire\Admin\Product;

use App\Admin\Product;
use Livewire\Component;
use App\Http\Livewire\Admin\Product\Create;

class Pending extends Component
{
    public $search;


    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.admin.product.pending', [
            'products' => $this->search === null ?
                Product::doesntHave('image')
                ->orDoesntHave('stock')
                ->where([
                    ['deleted_at', null],

                ])->get() :
                Product::whereHas('category', function ($query) {
                    $query->where([
                        ['name', 'like', '%' . $this->search . '%'],
                        ['deleted_at', null],
                        ['status', false],
                    ]);
                })
                ->orWhere([
                    ['name', 'like', '%' . $this->search . '%'],
                    ['deleted_at', null],
                    ['status', false],
                ])->get()
        ]);

        // return view('livewire.admin.product.pending');
    }




    public function insert_stock($product_id)
    {
        $this->emit('insert_stock', $product_id);
    }


    public function imageInsert($product_id)
    {
        $this->emit('imageInsert', $product_id);
    }
}
