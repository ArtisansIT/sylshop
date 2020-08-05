<?php

namespace App\Http\Livewire\Admin\Productrequest;

use App\Admin\Product;
use Livewire\Component;

class SingleProduct extends Component
{

    public $pro_id;
    public $image_id_for_new_submition;
    public $image_delete_component;
    public
        $name,
        $link,
        $serch_tag,
        $short_description,
        $long_description,
        $ship_return,
        $offer_price,
        $pro_umage,
        $main_price;

    public $record;



    protected $listeners = [
        'refreshAfterImageUpdate',
    ];

    public function mount($pro_id)
    {
        $this->pro_id = $pro_id;
        $this->image_delete_component = false;

        $this->record = Product::with(
            'image',
            'shop:id,name',
            'category:id,name',
            'subcategory:id,name',
            'stock:product_id,stock,variation_stock'
        )->findOrFail($this->pro_id);

        $this->name =  $this->record->name;
        $this->link =  $this->record->link;
        $this->serch_tag =  $this->record->serch_tag;
        $this->short_description =  $this->record->short_description;
        $this->long_description =  $this->record->long_description;
        $this->ship_return =  $this->record->ship_return;
        $this->offer_price =  $this->record->offer_price;
        $this->main_price =  $this->record->main_price;
    }
    public function render()
    {
        return view('livewire.admin.productrequest.single-product', [
            'product' => Product::with(
                'image'
            )->findOrFail($this->pro_id)
        ]);
    }

    public function removeImage($id)
    {
        $this->image_id_for_new_submition = $id['id'];
        \File::delete('images/' . $id['url']);
        $this->image_delete_component = true;
    }

    public function refreshAfterImageUpdate()
    {
        $this->image_delete_component = false;
    }

    public function submitForm()
    {
        $this->validate([

            'name' => 'required',
            'main_price' => 'required',
            'long_description' => 'required',
            'short_description' => 'required',
            'link' => 'required',
            'ship_return' => 'required',
            'serch_tag' => 'required',
        ]);


        $this->record->update([
            'name' => $this->name,
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

        $this->emit('backToRequestProduct');
    }
}
