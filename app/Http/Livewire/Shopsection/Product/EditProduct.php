<?php

namespace App\Http\Livewire\Shopsection\Product;

use App\Admin\Product;
use Livewire\Component;

use App\Admin\Subcategory;
use function GuzzleHttp\Promise\all;

class EditProduct extends Component
{
    public $allsubcategorys;
    public $selected_id;



    public $name;
    public $category;
    public $shop;
    public $photo;
    public $subcategory;
    public $main_price;
    public $offer_price;
    public $link;
    public $ship_return;
    public $serch_tag;
    public $short_description;
    public $long_description;
    public $stock; // stock create page variable
    public $variation_stock;



    public $record;

    protected $listeners = [];

    public function mount($product)
    {
        // $this->selected_id = $product;
        $this->allsubcategorys = Subcategory::all();

        $this->record = Product::with('stock')->findOrFail($product);
        $this->name = $this->record->name;

        $this->name = $this->record->name;
        $this->subcategory = $this->record->subcategory_id;
        $this->main_price = $this->record->main_price;
        $this->offer_price = $this->record->offer_price;
        $this->link = $this->record->link;
        $this->serch_tag = $this->record->serch_tag;
        $this->short_description = $this->record->short_description;
        $this->long_description = $this->record->long_description;
        $this->ship_return = $this->record->ship_return;
    }

    public function updateProduct()
    {
        $this->validate([

            'name' => 'required',
            'main_price' => 'required',
            'subcategory' => 'required',
            'long_description' => 'required',
            'short_description' => 'required',
            'link' => 'required',
            'ship_return' => 'required',
            'serch_tag' => 'required',
        ]);


        $this->record->update([
            'name' => $this->name,
            'subcategory_id' => $this->subcategory,
            'main_price' => $this->main_price,
            'offer_price' => $this->offer_price,
            'short_description' => $this->short_description,
            'link' => $this->link,
            'long_description' => $this->long_description,
            'offer_price' => $this->offer_price,
            'serch_tag' => $this->serch_tag,
            'ship_return' => $this->ship_return,
            'status' => 1
        ]);

        $this->emit('update_Product_from_update_page');
    }

    public function render()
    {
        return view('livewire.shopsection.product.edit-product');
    }
}
