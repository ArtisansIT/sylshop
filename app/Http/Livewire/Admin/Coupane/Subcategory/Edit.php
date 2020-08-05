<?php

namespace App\Http\Livewire\Admin\Coupane\Subcategory;

use App\Admin\Shop;
use App\Admin\Coupane;
use App\Admin\Category;
use App\Admin\Subcategory;
use Livewire\Component;

class Edit extends Component
{

    public $name, $code, $total, $discount, $record;
    public $shops, $subcategorys = [], $category_id,
        $shop_id, $subcategory_id;

    public function mount($coupane_id)
    {
        $this->record = Coupane::findOrFail($coupane_id);
        $this->category_id = $this->record->category_id;
        $this->subcategory_id = $this->record->subcategory_id;
        $this->shop_id = $this->record->shop_id;
        $this->name = $this->record->name;
        $this->code = $this->record->code;
        $this->total = $this->record->total;
        $this->discount = $this->record->discount;
    }
    public function render()
    {
        if (!empty($this->category_id)) {
            $this->shops = Shop::where([
                ['category_id', $this->category_id],
                ['deleted_at', null],
                ['status', true]
            ])->get();
        }
        return view('livewire.admin.coupane.subcategory.edit')
            ->withCategorys(Category::orderBy('name')->get());
    }

    public function submitForm()
    {
        $this->validate([
            'category_id' => 'required',
            'shop_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'total' => 'required',
            'discount' => 'required',
        ]);

        $cat = Category::with('shop')->findOrFail($this->category_id);
        $shop  = Shop::with(['subcategorys' => function ($q) {
            $q->where('id', $this->subcategory_id);
        }])->findOrFail($this->shop_id);

        if (count($cat->shop) < 1) {

            return false;
        }

        if (count($shop->subcategorys) < 1) {

            return false;
        }






        $this->record->update([
            'category_id' => $this->category_id,
            'shop_id' => $this->shop_id,
            'subcategory_id' => $this->subcategory_id,
            'name' => $this->name,
            'code' => $this->code,
            'total' => $this->total,
            'discount' => $this->discount,
        ]);

        $this->emit('backToCategoryCoupane');
    }

    public function shopChange()
    {

        $this->subcategorys = Subcategory::where([
            ['shop_id', $this->shop_id],
            ['status', true],
            ['deleted_at', null]
        ])->get();
    }


    // public function rs(){
    //     $this->
    // }
}
