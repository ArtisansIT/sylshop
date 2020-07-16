<?php

namespace App\Http\Livewire\Shopsection\Product;

use Exception;
use App\Admin\Stock;
use App\Admin\Product;
use Livewire\Component;
use App\Admin\Subcategory;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic;
use App\Admin\Variation;

class Create extends Component
{

    use WithFileUploads;

    public $goto_create_page;
    public $goto_index_page;
    public $goto_inactive_page;
    public $goto_edit_page;
    public $img_upload_page;
    public $stock_page;
    public $un_complete_product_page;
    public $pending_stock_page;
    public $all_product_page = false;
    public $edit_product_page;
    public $one_product_all_image;
    public $go_update_stock_page;
    public $go_update_variation_stock_page;
    public $pending_all_product_page = false;


    public $product_variation_create;
    public $product_variation_index;
    public $product_variation_edit;


    public $shops = [];
    public $subcategorys = [];

    public $resizeImage;

    public $name;
    public $category;
    public $shop;
    public $photo;
    public $subcategory;
    public $main_price;
    public $offer_price;
    public $link;

    public $short_description;

    public $stock; // stock create page variable
    public $variation_stock;
    public $edit_id_fro_product_in_edit_page;



    public $productId; // current created product id
    public $fullProduct; // current created product full 

    public $allimages;

    public $image;

    public $selected_id; // stock  edit page
    public $categoryies;


    public $pro_id_for_update_stock;
    public $pro_id_for_update_variation_stock;

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
        $this->go_update_variation_stock_page = false;
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
        $this->go_update_variation_stock_page = false;
        $this->pending_all_product_page = false;
        $this->product_variation_create = false;
        $this->product_variation_index = false;
        $this->product_variation_edit = false;
    }

    protected $listeners = [
        'insert_stock',
        'SSimageInsert',
        'SSedit_product',
        'SSsee_all_image' => 'see_all_image',
        'go_and_update_stock' => 'go_and_update_stock',
        'go_and_update_variation_stock' => 'go_and_update_variation_stock',
        'SSsoftDelete_product' => 'softDelete_product',
        'SSrestore_product' => 'restore_product',
        'SSforceDelete_product' => 'forceDelete_product',
        'allVariation' => 'allVariation',
        'update_Product_from_update_page' => 'all_product_page',



    ];
    public function render()
    {
        return view('livewire.shopsection.product.create', [

            'allsubcategorys' => Subcategory::where([
                ['deleted_at', null],
                ['status', true],
            ])->get()
        ]);
    }


    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
            'main_price' => 'required',
            'stock' => 'required',
            'short_description' => 'required',

            'stock' => 'required',
            'photo' => 'required|image|max:2048', // 1MB Max

        ]);

        DB::beginTransaction();
        try {

            $pro_code = time();
            $fullProduct =  Product::create([
                'name' => $this->name,
                'code' => $pro_code,
                'main_price' => $this->main_price,
                'offer_price' => $this->offer_price,
                'category_id' => auth()->user()->shop->category_id,
                'shop_id' =>  auth()->user()->shop->id,
                'subcategory_id' => $this->subcategory,
                'short_description' => $this->short_description,
                'link' => $this->link,
                'offer_price' => $this->offer_price,

            ]);
            $fullProduct->adons()->create();

            $fullProduct->stock()->create([
                'stock' => $this->stock,
                'variation_stock' => $this->variation_stock,
            ]);

            $this->resizeImage();
            $fullProduct->image()->create([
                'url' => $this->imageName,
            ]);
            $this->reset();
            $this->goto_create_page = true;


            session()->flash('message', 'Product successfully create.');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function resizeImage()
    {
        $this->imageName  = $this->imageNameCreate();
        $imgPath = 'images/' . $this->imageName;
        ImageManagerStatic::make($this->photo)->resize(460, 460)->encode('jpg')->save($imgPath);
    }
    public function imageNameCreate()
    {
        return  time() . '_' . uniqid() . '_' . 'Product' . '.jpg';
    }

    public function go_and_update_variation_stock($product)

    {
        $this->pro_id_for_update_variation_stock = Stock::where('product_id', $product)
            ->first();

        $this->resetAllPageValue();
        $this->variation_stock = '';
        $this->go_update_variation_stock_page = true;
    }


    public function add_update_variation_stock()
    {
        $this->validate([
            'variation_stock' => 'required',
        ]);


        $this->pro_id_for_update_variation_stock->update([
            'variation_stock' =>
            $this->pro_id_for_update_variation_stock->variation_stock +
                $this->variation_stock,
        ]);
        $this->resetAllPageValue();
        // $this->pro_id_for_update_stock = '';
        $this->reset();
        $this->all_product_page = true;
    }
    public function remove_update_variation_stock()
    {
        $this->validate([
            'variation_stock' => 'required'
        ]);


        $this->pro_id_for_update_variation_stock->update([
            'variation_stock' =>  $this->pro_id_for_update_variation_stock->variation_stock -
                $this->variation_stock,
        ]);
        $this->resetAllPageValue();
        $this->reset();
        $this->all_product_page = true;
    }

    public function add_update_stock()
    {
        $this->validate([
            'stock' => 'required',
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

    public function SSedit_product($product)
    {
        $this->edit_id_fro_product_in_edit_page = $product;
        $this->resetAllPageValue();
        $this->edit_product_page = true;
    }
    public function see_all_image($product)
    {
        $this->edit_id_fro_product_in_edit_page = $product;

        // dd($this->allimages->image->product);

        $this->resetAllPageValue();
        $this->one_product_all_image = true;
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
        $this->restStock_in_all_variation = $this->allVariations->stock->variation_stock - $this->allVariations
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
            'stock' => 'required',
        ]);

        if ($data->variations->count() > 0) {
            $var_sum =  $data->variations()->sum('stock');
            $this->rest = $data->stock->variation_stock - $var_sum;
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

            'stock' => 'required',
        ]);


        $var_sum = ($data->variations()->sum('stock')) - $currentVariation->stock;
        $this->rest = $data->stock->variation_stock - $var_sum;





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
