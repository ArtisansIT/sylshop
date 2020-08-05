<?php

namespace App\Http\Livewire\Shop;

use App\Admin\Category;
use App\Admin\Shop;
use Livewire\Component;

class EditAShop extends Component
{

    public $record;
    public $allcategorys;

    public $shopid,
        $name,
        $category,
        $address,
        $link,
        $about,
        $shipping,
        $formsubmit,
        $licence,
        $boss_name,
        $phone,
        $email,
        $boss_address,
        $boss_nid,
        $bank_account_name,
        $bank_account_number,
        $bank_name,
        $processing_rate,
        $delevered_rate,
        $processing_commision_rate,
        $delevered_commision_rate;

    public function mount($shop_id)
    {
        $this->allcategorys = Category::all();
        $this->record = Shop::findOrFail($shop_id);

        $this->name = $this->record->name;
        $this->category = $this->record->category_id;
        $this->licence = $this->record->licence;
        $this->address = $this->record->address;
        $this->link = $this->record->link;
        $this->shipping = $this->record->shipping;
        $this->boss_name = $this->record->boss_name;
        $this->phone = $this->record->phone;
        $this->processing_rate = $this->record->procecing_rate;
        $this->delevered_rate = $this->record->delevered_rate;
        $this->processing_commision_rate = $this->record->procecing_commision_rate;
        $this->delevered_commision_rate = $this->record->procecing_commision_rate;
        $this->email = $this->record->email;
        $this->boss_address = $this->record->boss_address;
        $this->boss_nid = $this->record->boss_nid;
        $this->bank_account_name = $this->record->bank_account_name;
        $this->bank_account_number = $this->record->bank_account_number;
        $this->bank_name = $this->record->bank_name;


        // dd($this->record);
    }
    public function render()
    {
        return view('livewire.shop.edit-a-shop');
    }

    public function updateShop()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'address' => 'required',
            'link' => 'required',
            'email' => 'required|email',
            'shipping' => 'required',
            'processing_rate' => 'required',
            'delevered_rate' => 'required',
            'processing_commision_rate' => 'required',
            'delevered_commision_rate' => 'required',
            'boss_name' => 'required',
            'phone' => 'required|numeric|regex:/(01)[0-9]{9}/',
            'boss_address' => 'required',
            'boss_nid' => 'required',


        ]);

        $this->record->update([
            'name' => $this->name,
            'licence' => $this->licence,
            'category_id' => $this->category,
            'address' => $this->address,
            'link' => $this->link,
            'shipping' => $this->shipping,
            'boss_name' => $this->boss_name,
            'phone' => $this->phone,
            'procecing_rate' => $this->processing_rate,
            'delevered_rate' => $this->delevered_rate,
            'procecing_commision_rate' => $this->processing_commision_rate,
            'delevered_commision_rate' => $this->delevered_commision_rate,
            'email' => $this->email,
            'boss_address' => $this->boss_address,
            'boss_nid' => $this->boss_nid,
            'bank_account_name' => $this->bank_account_name,
            'bank_account_number' => $this->bank_account_number,
            'bank_name' => $this->bank_name,
        ]);
        // dd($this->currentShop->id);

        $this->emit('backToAllShop');
    }
}
