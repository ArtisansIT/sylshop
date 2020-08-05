<?php

namespace App\Http\Livewire\Admin\Productrequest;

use App\Admin\Product;
use Livewire\Component;

class RequestedProduct extends Component
{

    public $search;
    public $request_all_product;
    public $edit_product;
    public $pro_id;


    protected $listeners = [
        'backToRequestProduct',
    ];
    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->request_all_product = true;
        $this->edit_product = false;
    }
    public function render()
    {
        return view('livewire.admin.productrequest.requested-product', [
            'products' => $this->search === null ?
                Product::with(
                    'image',
                    'shop:id,name',
                    'category:id,name',
                    'stock'
                )->where([
                    ['long_description',  null],
                    ['ship_return',  null],
                    ['link',  null],
                    ['status', 0]
                ])->get() :
                Product::with(
                    'image',
                    'shop:id,name',
                    'category:id,name',
                    'stock'
                )->where([
                    ['long_description',  null],
                    ['ship_return',  null],
                    ['link',  null],
                    ['status', 0],
                    ['code', 'like', '%' . $this->search . '%'],
                ])
                ->orWhere([
                    ['long_description',  null],
                    ['ship_return',  null],
                    ['link',  null],
                    ['status', 0],
                    ['name', 'like', '%' . $this->search . '%'],
                ])->get()
        ]);
    }

    public function edit($id)
    {
        $this->pro_id = $id;
        $this->request_all_product = false;
        $this->edit_product = true;
    }
    public function backToRequestProduct()
    {
        $this->request_all_product = true;
        $this->edit_product = false;
    }
}
