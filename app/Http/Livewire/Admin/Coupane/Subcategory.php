<?php

namespace App\Http\Livewire\Admin\Coupane;

use App\Admin\Shop as AdminShop;
use App\Admin\Coupane;
use App\Admin\Category;
use Livewire\Component;
use App\Admin\Subcategory as AdminSubcategory;

class Subcategory extends Component
{
    public $form = [
        'name' => '',
        'category_id' => '',
        'code' => '',
        'total' => '',
        'discount' => '',
        'shop_id' => '',
        'subcategory_id' => '',

    ];
    public $shops = [];
    public $subcategorys = [];



    public function render()
    {
        if (!empty($this->form['category_id'])) {
            $this->shops = AdminShop::where([
                ['category_id', $this->form['category_id']],
                ['deleted_at', null],
                ['status', true]
            ])->get();
        }

        return view('livewire.admin.coupane.subcategory')
            ->withCategorys(Category::orderBy('name')->get());
    }

    public function submitForm()
    {
        $this->validate([
            'form.name' => 'required',
            'form.category_id' => 'required',
            'form.shop_id' => 'required',
            'form.subcategory_id' => 'required',
            'form.code' => 'required',
            'form.total' => 'required|numeric',
            'form.discount' => 'required|numeric',
        ]);

        Coupane::create($this->form);
        $this->emit('coupaneCreate');
    }

    public function shopChange()
    {

        $this->subcategorys = AdminSubcategory::where([
            ['shop_id', $this->form['shop_id']],
            ['status', true],
            ['deleted_at', null]
        ])->get();
    }
}
