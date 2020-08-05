<?php

namespace App\Http\Livewire\Admin\Coupane\Shop;

use App\Admin\Coupane;
use App\Admin\Category;
use App\Admin\Shop;
use Livewire\Component;

class Edit extends Component
{

    public $name, $code, $total, $discount, $coin, $record;
    public  $shops, $category_id, $shop_id;

    public function mount($coupane_id)
    {
        $this->record = Coupane::findOrFail($coupane_id);
        $this->category_id = $this->record->category_id;
        $this->shop_id = $this->record->shop_id;
        $this->name = $this->record->name;
        $this->code = $this->record->code;
        $this->total = $this->record->total;
        $this->discount = $this->record->discount;
        $this->coin = $this->record->coin;
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
        return view('livewire.admin.coupane.shop.edit')
            ->withCategorys(Category::orderBy('name')->get());
    }

    public function submitForm()
    {
        $this->validate([
            'category_id' => 'required',
            'shop_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'total' => 'required',
            'discount' => 'required',
        ]);

        $cat  = Category::with(['shop' => function ($q) {
            $q->where('id', $this->shop_id);
        }])->findOrFail($this->category_id);

        if (count($cat->shop) < 1) {

            return false;
        }

        $this->record->update([
            'category_id' => $this->category_id,
            'shop_id' => $this->shop_id,
            'name' => $this->name,
            'code' => $this->code,
            'total' => $this->total,
            'discount' => $this->discount,
        ]);




        // dd($this->currentShop->id);

        $this->emit('backToCategoryCoupane');
    }
}
