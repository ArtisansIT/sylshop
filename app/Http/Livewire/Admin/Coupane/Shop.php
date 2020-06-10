<?php

namespace App\Http\Livewire\Admin\Coupane;

use App\Admin\Coupane;
use App\Admin\Category;
use Livewire\Component;
use App\Admin\Shop as AdminShop;

class Shop extends Component
{
    public $shops = [];

    public $form = [
        'name' => '',
        'category_id' => '',
        'code' => '',
        'total' => '',
        'discount' => '',
        'shop_id' => '',

    ];
    public function render()
    {
        if (!empty($this->form['category_id'])) {
            $this->shops = AdminShop::where([
                ['category_id', $this->form['category_id']],
                ['deleted_at', null],
                ['status', true]
            ])->get();
        }
        return view('livewire.admin.coupane.shop')
            ->withCategorys(Category::orderBy('name')->get());
    }

    public function submitForm()
    {
        $this->validate([
            'form.name' => 'required',
            'form.category_id' => 'required',
            'form.shop_id' => 'required',
            'form.code' => 'required',
            'form.total' => 'required|numeric',
            'form.discount' => 'required|numeric',
        ]);

        Coupane::create($this->form);
        $this->emit('coupaneCreate');
    }
}
