<?php

namespace App\Http\Livewire\Admin\Coupane\Shop;

use App\Admin\Coupane;
use Livewire\Component;

class All extends Component
{

    public
        $all_shop,
        $inactive_list_shop,
        $edit_shop;
    public $search;
    public $coupane_id;

    protected $listeners = [
        'backToCategoryCoupane',
        'inactive_back_form_shop',
        'shop_inactive_list',
    ];

    public function render()
    {
        return view('livewire.admin.coupane.shop.all', [
            'coupanes' =>  $this->search === null ?
                Coupane::with('category')->where([
                    ['category_id', '!=', null],
                    ['shop_id', '!=', null],
                    ['subcategory_id', null],
                    ['user_id', null]
                ])->get() :
                Coupane::with('category')->where([
                    ['category_id', '!=', null],
                    ['shop_id', '!=', null],
                    ['subcategory_id', null],
                    ['user_id', null],
                    ['name', 'like', '%' . $this->search . '%']
                ])->get()
        ]);
    }

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->all_shop = true;
        $this->edit_shop = false;
        $this->inactive_list_shop = false;
    }

    public function edit_coupane($id)
    {
        $this->coupane_id = $id;
        $this->all_shop = false;
        $this->inactive_list_shop = false;
        $this->edit_shop = true;
    }

    public function backToCategoryCoupane()
    {
        $this->edit_shop = false;
        $this->inactive_list_shop = false;
        $this->all_shop = true;
    }
    public function inactive_back_form_shop()
    {
        $this->all_shop = true;
        $this->edit_shop = false;
        $this->inactive_list_shop = false;
    }
    public function shop_inactive_list()
    {
        $this->inactive_list_shop = true;
        $this->all_shop = false;
        $this->edit_shop = false;
    }
    public function softDelete_coupane($id)
    {
        Coupane::findOrfail($id)->delete();
    }
}
