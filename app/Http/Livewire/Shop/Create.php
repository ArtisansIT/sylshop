<?php

namespace App\Http\Livewire\Shop;

use App\Admin\Shop;
use App\Admin\Product;
use App\Admin\Category;
use App\Admin\Subcategory;
use Livewire\Component;

class Create extends Component
{


    public $goto_create_page;
    public $img_upload_page;
    public $img_update_page;
    public $all_shop_page;
    public $goto_edit_page;
    public $un_complete_shop_page;
    public $inactive_all_shop_page;
    public $shop_pending_page;



    public $shopid;
    public $name;
    public $category;
    public $categories;
    public $address;
    public $link;
    public $about;
    public $shipping;
    public $formsubmit;
    public $image;
    public $banner;
    public $status;


    public $currentShop;

    protected $listeners = [
        'editShop',
        'bannerUpdate',
        'imageUpdate',
        'softDeleteShop',
        'restore_shop',
        'forceDelete_shop',
        'pendingImage'
    ];

    public function mount()
    {
        $this->goto_create_page = true;
        $this->all_shop_page = false;
        $this->img_upload_page = false;
        $this->img_update_page = false;
        $this->goto_inactive_page = false;
        $this->goto_edit_page = false;
        $this->inactive_all_shop_page = false;
        $this->shop_pending_page = false;
    }

    public function resetAllPageValue()
    {
        $this->goto_create_page = false;
        $this->all_shop_page = false;
        $this->img_upload_page = false;
        $this->img_update_page = false;
        $this->goto_inactive_page = false;
        $this->goto_edit_page = false;
        $this->inactive_all_shop_page = false;
        $this->shop_pending_page = false;
    }

    public function render()
    {
        return view('livewire.shop.create')
            ->withCategorys(Category::orderBy('name')->get());
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'address' => 'required',
            'link' => 'required',
            'about' => 'required',
            'shipping' => 'required',
        ]);

        $this->currentShop = Shop::create([
            'name' => $this->name,
            'category_id' => $this->category,
            'address' => $this->address,
            'link' => $this->link,
            'about' => $this->about,
            'shipping' => $this->shipping,
        ]);

        $this->shopid = $this->currentShop->id;

        $this->resetAllPageValue();
        $this->img_upload_page = true;
    }

    public function all_shop_page()
    {

        $this->resetAllPageValue();
        $this->all_shop_page = true;
    }

    public function go_create_page()
    {
        $this->reset();
        $this->resetAllPageValue();
        $this->goto_create_page = true;
    }

    public function editShop($category)
    {
        $this->categories = Category::all();
        $record = Shop::findOrFail($category);

        $this->shopid = $category;
        $this->name = $record->name;
        $this->category = $record->category_id;

        $this->address = $record->address;
        $this->link = $record->link;
        $this->about = $record->about;
        $this->shipping = $record->shipping;

        $this->resetAllPageValue();
        $this->goto_edit_page = true;
    }
    public function updateShop()
    {
        if ($this->shopid) {
            $record = Shop::find($this->shopid);
            $record->update([
                'name' => $this->name,
                'category_id' => $this->category,
                'address' => $this->address,
                'link' => $this->link,
                'about' => $this->about,
                'shipping' => $this->shipping,
            ]);

            $this->reset();
            $this->resetAllPageValue();
            $this->all_shop_page = true;
        }
    }

    public function imageUpdate($category)
    {
        $this->shopid = $category;
        $this->resetAllPageValue();
        $this->img_update_page = true;
    }

    public function softDeleteShop($shop)
    {
        Shop::findOrFail($shop)->delete();
        $this->resetAllPageValue();
        $this->inactive_all_shop_page = true;
    }

    public function inactive_all_shop_page()
    {

        $this->resetAllPageValue();
        $this->inactive_all_shop_page = true;
    }

    public function restore_shop($shop)
    {

        Shop::where('id', $shop)
            ->onlyTrashed()
            ->first()
            ->restore();
        $this->resetAllPageValue();
        $this->all_shop_page = true;
    }
    public function forceDelete_shop($shop)
    {
        $subcategorys = Subcategory::onlyTrashed()->where([
            ['shop_id', $shop],
        ])->get();
        if ($subcategorys->count() <= 0) {
            $shopId = Shop::onlyTrashed()->where('id', $shop)->first();
            if ($shopId->image->url) {

                \File::delete('images/' . $shopId->image->url);
            }
            if ($shopId->image->banner) {

                \File::delete('images/' . $shopId->image->banner);
            }
            $shopId->image->delete();
        } else {
            session()->flash('message', 'Can not Delete shop , 
            First Delete all subcategory.');
            return redirect()->route('admin.shop');
        }
        // if ($shopId->subcategorys->count() > 0) {
        //     return  dd('true');
        // } else {
        //     return dd('false');
        // }
        // \File::delete('images/' . $shopId->image->url);


        // $shopId->image()->delete();

        $shopId->forceDelete();
        $this->resetAllPageValue();
        $this->all_shop_page = true;
    }

    public function pendingImage($shop)
    {
        $this->shopid = $shop;

        $this->resetAllPageValue();
        $this->img_upload_page = true;
    }

    public function validateImage()
    {
        $this->validate([
            'image' => 'required',
            'banner' => 'required',
        ]);
    }

    public function pending_page()
    {
        $this->resetAllPageValue();
        $this->shop_pending_page = true;
    }
}
