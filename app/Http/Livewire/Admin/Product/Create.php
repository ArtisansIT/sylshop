<?php

namespace App\Http\Livewire\Admin\Product;

use App\Admin\Shop;
use App\Admin\Stock;
use App\Admin\Product;
use App\Admin\Category;
use App\Admin\Image;
use Livewire\Component;
use App\Admin\Subcategory;
use App\Admin\Variation;
use App\Repositories\CategoryRepositories;

class Create extends Component
{


    public $goto_create_page;
    public $goto_index_page;
    public $goto_inactive_page;
    public $goto_edit_page;
    public $img_upload_page;
    public $stock_page;
    public $un_complete_product_page;
    public $pending_stock_page;
    public $all_product_page;
    public $edit_product_page;
    public $one_product_all_image;
    public $go_update_stock_page;
    public $pending_all_product_page;


    public $product_variation_create;
    public $product_variation_index;
    public $product_variation_edit;


    public $shops = [];
    public $subcategorys = [];


    public $name;
    public $category;
    public $shop;
    public $subcategory;
    public $main_price;
    public $offer_price;
    public $link;
    public $ship_return;
    public $serch_tag;
    public $short_description;
    public $long_description;

    public $productId; // current created product id
    public $fullProduct; // current created product full 

    public $allimages;

    public $stock; // stock create page variable

    public $selected_id; // stock  edit page
    public $categoryies;

    public $image;

    public $pro_id_for_update_stock;

    //pending Variable

    public $pending_stock_product_id;


    //variation variables 
    public $pro_id_for_variation;
    public $allVariations;
    public $restStock_in_all_variation;
    public $variationEditCurrentId;


    public $rest;




    public function mount()

    {
        $this->goto_create_page = true;
        $this->goto_index_page = false;
        $this->goto_inactive_page = false;
        $this->goto_edit_page = false;
        $this->img_upload_page = false;
        $this->stock_page = false;
        $this->un_complete_product_page = false;
        $this->pending_stock_page = false;
        $this->all_product_page = false;
        $this->edit_product_page = false;
        $this->one_product_all_image = false;
        $this->go_update_stock_page = false;
        $this->pending_all_product_page = false;
        $this->product_variation_create = false;
        $this->product_variation_index = false;
        $this->product_variation_edit = false;
    }

    public function resetAllPageValue()
    {
        $this->goto_create_page = false;
        $this->goto_index_page = false;
        $this->goto_inactive_page = false;
        $this->goto_edit_page = false;
        $this->img_upload_page = false;
        $this->stock_page = false;
        $this->un_complete_product_page = false;
        $this->pending_stock_page = false;
        $this->all_product_page = false;
        $this->edit_product_page = false;
        $this->one_product_all_image = false;
        $this->go_update_stock_page = false;
        $this->pending_all_product_page = false;
        $this->product_variation_create = false;
        $this->product_variation_index = false;
        $this->product_variation_edit = false;
    }

    protected $listeners = [
        'insert_stock',
        'imageInsert',
        'edit_product',
        'see_all_image',
        'go_and_update_stock',
        'softDelete_product',
        'restore_product',
        'forceDelete_product',
        'allVariation',



    ];


    public function render()
    {
        if (!empty($this->category)) {
            $this->shops = Shop::where([
                ['category_id', $this->category],
                ['deleted_at', null],
                ['status', true]
            ])->get();
        }
        return view('livewire.admin.product.create')
            ->withCategorys(Category::orderBy('name')->get());
    }

    public function shopChange()
    {

        $this->subcategorys = Subcategory::where([
            ['shop_id', $this->shop],
            ['status', true],
            ['deleted_at', null]
        ])->get();
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'shop' => 'required',
            'subcategory' => 'required',
            'main_price' => 'required',
            'long_description' => 'required',
            'short_description' => 'required',
            'link' => 'required',
            'ship_return' => 'required',
            'offer_price' => 'required',
            'serch_tag' => 'required',
        ]);


        $this->fullProduct =  Product::create([
            'name' => $this->name,
            'main_price' => $this->main_price,
            'offer_price' => $this->offer_price,
            'category_id' => $this->category,
            'shop_id' => $this->shop,
            'subcategory_id' => $this->subcategory,
            'short_description' => $this->short_description,
            'link' => $this->link,
            'long_description' => $this->long_description,
            'offer_price' => $this->offer_price,
            'serch_tag' => $this->serch_tag,
            'ship_return' => $this->ship_return,

        ]);
        $this->fullProduct->adons()->create();

        $this->productId = $this->fullProduct->id;



        //Activing Stock Component
        $this->resetAllPageValue();
        $this->stock_page = true;
    }

    public function stock_create_for_the_proddct()
    {
        $this->validate([
            'stock' => 'required'
        ]);


        Stock::create([
            'stock' => $this->stock,
            'product_id' => $this->productId
        ]);

        $this->resetAllPageValue();

        $this->img_upload_page = true;
    }



    public function un_complete_product_page()
    {
        $this->resetAllPageValue();
        $this->un_complete_product_page = true;
    }

    public function insert_stock($product_id)
    {

        $this->productId = $product_id;
        $this->resetAllPageValue();
        $this->stock_page = true;
    }

    public function add_update_stock()
    {
        $this->validate([
            'stock' => 'required'
        ]);


        $this->pro_id_for_update_stock->update([
            'stock' =>  $this->pro_id_for_update_stock->stock +  $this->stock,
        ]);
        $this->resetAllPageValue();
        // $this->pro_id_for_update_stock = '';
        $this->reset();
        $this->all_product_page = true;
    }
    public function remove_update_stock()
    {
        $this->validate([
            'stock' => 'required'
        ]);


        $this->pro_id_for_update_stock->update([
            'stock' =>  $this->pro_id_for_update_stock->stock - $this->stock,
        ]);
        $this->resetAllPageValue();
        $this->reset();
        $this->all_product_page = true;
    }


    public function go_and_update_stock($product)

    {
        $this->pro_id_for_update_stock = Stock::where('product_id', $product)
            ->first();

        $this->resetAllPageValue();
        $this->stock = '';
        $this->go_update_stock_page = true;
    }

    public function imageInsert($product_id)
    {
        $this->resetAllPageValue();
        $this->img_upload_page = true;


        $this->productId = $product_id;
    }

    public function all_product_page()
    {
        $this->resetAllPageValue();

        $this->all_product_page = true;
    }


    public function pending_all_product_page()
    {

        $this->resetAllPageValue();

        $this->pending_all_product_page = true;
    }


    public function go_create_page()
    {
        $this->reset();
        $this->goto_create_page = true;
    }

    public function edit_product($product)
    {
        $this->resetAllPageValue();
        $this->edit_product_page = true;


        $record = Product::findOrFail($product);
        $this->selected_id = $product;

        $this->name = $record->name;

        $this->name = $record->name;
        $this->category = $record->category_id;
        $this->shop = $record->shop_id;
        $this->subcategory = $record->subcategory_id;
        $this->main_price = $record->main_price;
        $this->offer_price = $record->offer_price;
        $this->link = $record->link;
        $this->ship_return = $record->ship_return;
        $this->serch_tag = $record->serch_tag;
        $this->short_description = $record->short_description;
        $this->long_description = $record->long_description;

        $this->categoryies = Category::orderBy('name')->get();
        if (!empty($this->category)) {
            $this->shops = Shop::where([
                ['category_id', $this->category],
                ['deleted_at', null],
                ['status', true]
            ])->get();
        }
        $this->subcategorys = Subcategory::where([
            ['deleted_at', null],
            ['status', true]
        ])->get();
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'shop' => 'required',
            'subcategory' => 'required',
            'main_price' => 'required',
            'long_description' => 'required',
            'short_description' => 'required',
            'link' => 'required',
            'ship_return' => 'required',
            'offer_price' => 'required',
            'serch_tag' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Product::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'category_id' => $this->category,
                'shop_id' => $this->shop,
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


            $this->reset();
            $this->all_product_page = true;
        }
    }
    public function see_all_image($product)
    {
        $this->allimages = Product::findOrFail($product)
            ->load('image');
        // dd($this->allimages->image->product);

        $this->resetAllPageValue();
        $this->one_product_all_image = true;
    }

    public function single_product_image_update($image_id)
    {
        $data = Image::findOrFail($image_id);
        $this->productId = $data->imageable->id;
        \File::delete('images/' . $data->url);
        $data->delete();

        $this->resetAllPageValue();
        $this->img_upload_page = true;
    }
    public function single_product_image_delete($image_id)
    {
        $data = Image::findOrFail($image_id);
        \File::delete('images/' . $data->url);
        $data->delete();
        $this->reset();
        $this->all_product_page = true;
    }
    public function softDelete_product($id)
    {
        Product::findOrfail($id)->delete();
        $this->resetAllPageValue();
        $this->pending_all_product_page = true;
    }

    public function restore_product($product)
    {
        Product::onlyTrashed()->find($product)->restore();
        $this->resetAllPageValue();
        $this->all_product_page = true;
    }
    public function forceDelete_product($product)
    {
        // $data = Product::onlyTrashed()->find($product);
        // dd($data);->forceDelete()
        $data =  Product::onlyTrashed()
            ->where('id', $product)
            ->first();

        if ($data->image->count() >= 0) {

            foreach ($data->image as $image) {
                \File::delete('images/' . $image->url);
            }
        }
        if ($data->stock) {

            $data->stock->delete();
        }
        $data->image()->delete();
        $data->forceDelete();
        $this->resetAllPageValue();
        $this->all_product_page = true;
    }

    public function createVariation($product)
    {
        $this->pro_id_for_variation = $product;
        $this->resetAllPageValue();
        $this->product_variation_create = true;
    }


    public function allVariation($product)
    {
        $this->allVariations = Product::with('variations')->findOrFail($product);
        $this->restStock_in_all_variation = $this->allVariations->stock->stock - $this->allVariations
            ->variations()->sum('stock');
        $this->resetAllPageValue();
        $this->product_variation_index = true;
    }

    public function variationSubmit()
    {


        $data = Product::findOrFail($this->pro_id_for_variation);


        // dd($data->stock->stock);
        $this->validate([
            'name' => 'required',
            'main_price' => 'required',
            'offer_price' => 'required',
            'stock' => 'required',
        ]);

        if ($data->variations->count() > 0) {
            $var_sum =  $data->variations()->sum('stock');
            $this->rest = $data->stock->stock - $var_sum;
        }



        if ($this->stock < $this->rest || ($this->rest == null)) {
            $data->variations()->create([
                'name' => $this->name,
                'sale_price' => $this->main_price,
                'offer_price' => $this->offer_price,
                'stock' => $this->stock,

            ]);
        } else {
            session()->flash('message', " Stock is Full ");
        }

        $this->reset();
        $this->resetAllPageValue();
        $this->all_product_page = true;
    }

    public function editVariation($variation)
    {
        $this->variationEditCurrentId = $variation;
        $record = Variation::findOrFail($variation);
        $this->name =  $record->name;
        $this->main_price = $record->sale_price;
        $this->offer_price = $record->offer_price;
        $this->stock = $record->stock;

        $this->resetAllPageValue();
        $this->product_variation_edit = true;
    }


    public function variationUpdateSubmit()
    {
        $currentVariation = Variation::findOrFail($this->variationEditCurrentId);

        $data = Product::findOrFail($currentVariation->product_id);



        // dd($data->stock->stock);
        $this->validate([
            'name' => 'required',
            'main_price' => 'required',
            'offer_price' => 'required',
            'stock' => 'required',
        ]);


        $var_sum = ($data->variations()->sum('stock')) - $currentVariation->stock;
        $this->rest = $data->stock->stock - $var_sum;





        if ($this->stock < $this->rest || ($this->rest == null)) {
            $currentVariation->update([
                'name' => $this->name,
                'sale_price' => $this->main_price,
                'offer_price' => $this->offer_price,
                'stock' => $this->stock,

            ]);
        } else {
            session()->flash('message', " Stock is Full ");
        }

        $this->reset();
        $this->resetAllPageValue();
        $this->all_product_page = true;
    }


    public function deleteVariation($variation)
    {
        Variation::findOrFail($variation)->delete();
        session()->flash('message', " variation Deleted ");
        $this->resetAllPageValue();
        $this->all_product_page = true;
    }
}
