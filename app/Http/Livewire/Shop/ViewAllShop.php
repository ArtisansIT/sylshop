<?php

namespace App\Http\Livewire\Shop;

use App\Admin\Shop;
use App\Admin\Category;
use Illuminate\Validation\Rules\Exists;
use Livewire\Component;

class ViewAllShop extends Component
{
    public $search;
    public $updateMode;
    public $imageUpdateMode;

    public $view_all_shop,
        $edit_a_shop;

    public $shop_id;



    public $categorys;
    public $name;
    public $category;
    public $address;
    public $link;
    public $about;
    public $shipping;
    public $status;
    public $selected_id;


    //Image edit variables

    public $image_select_id;

    protected $listeners = [
        'backToAllShop',
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->view_all_shop = true;
        $this->edit_a_shop = true;
    }


    public function render()
    {
        return view('livewire.shop.view-all-shop', [
            'shops' => $this->search === null ?
                Shop::where([
                    ['deleted_at', null],
                    ['status', true],


                ])->get() :
                Shop::where([
                    ['deleted_at', null],
                    ['status', true],
                    ['name', 'like', '%' . $this->search . '%']
                ])
                ->get()
        ]);
    }





    public function editShop($shop)
    {
        $this->shop_id = $shop;
        $this->view_all_shop = false;
        $this->edit_a_shop = true;
    }

    public function bannerUpdate($shop)
    {
        $this->emit('bannerUpdate', $shop);
    }



    public function imageUpdate($shop)
    {
        $this->emit('imageUpdate', $shop);
    }
    public function softDeleteShop($shop)
    {
        $this->emit('softDeleteShop', $shop);
    }

    public function pendingImage($shop)
    {
        $this->emit('pendingImage', $shop);
    }

    public function backToAllShop()
    {
        $this->view_all_shop = true;
        $this->edit_a_shop = false;
    }
}
