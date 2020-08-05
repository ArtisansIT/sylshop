<?php

namespace App\Http\Livewire\Admin\Coupane\Category;

use App\Admin\Coupane;
use App\Admin\Category;
use Livewire\Component;

class Edit extends Component
{

    public $name, $code, $total, $discount, $coin, $record;
    public $categorys, $category_id;

    public function mount($coupane_id)
    {
        $this->record = Coupane::findOrFail($coupane_id);
        $this->categorys = Category::all();
        $this->category_id = $this->record->category_id;
        $this->name = $this->record->name;
        $this->code = $this->record->code;
        $this->total = $this->record->total;
        $this->discount = $this->record->discount;
        $this->coin = $this->record->coin;
    }
    public function render()
    {
        return view('livewire.admin.coupane.category.edit');
    }

    public function updateCoupane()
    {
        $this->validate([
            'category_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'total' => 'required',
            'discount' => 'required',
        ]);

        $this->record->update([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'code' => $this->code,
            'total' => $this->total,
            'discount' => $this->discount,
        ]);


        // dd($this->currentShop->id);

        $this->emit('backToCategoryCoupane');
    }
}
