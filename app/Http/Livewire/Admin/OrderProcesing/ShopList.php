<?php

namespace App\Http\Livewire\Admin\OrderProcesing;

use App\Admin\Shop;
use Livewire\Component;

class ShopList extends Component
{
    public $search;
    public $shop_id;
    public $shop_list_page, $single_item_page;

    protected $listeners = [

        // 'Shop_backToMain' => 'backToMain',
        'back'

    ];
    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->shop_list_page = true;
        $this->single_item_page = false;
    }

    public function render()
    {
        return view('livewire.admin.order-procesing.shop-list', [
            'shops' => $this->search === null ?

                Shop::withCount(['processDelever' => function ($query) {
                    $query->where([
                        ['processing_status', true],
                        ['processing_payment_status', false],
                    ]);
                }])->with('image')
                ->whereHas('processDelever', function ($query) {
                    $query->where([
                        ['processing_status', true],
                        ['processing_payment_status', false],
                    ]);
                })->get() :

                Shop::withCount(['processDelever' => function ($query) {
                    $query->where([
                        ['processing_status', true],
                        ['processing_payment_status', false],
                    ]);
                }])->with('image')
                ->whereHas('processDelever', function ($query) {
                    $query->where([
                        ['processing_status', true],
                        ['processing_payment_status', false],
                    ]);
                })->where([
                    ['name', 'like', '%' . $this->search . '%'],
                    ['deleted_at', null],
                    ['status', true],
                ])->get()
        ]);
    }

    public function details($id)
    {
        $this->shop_id = $id;
        $this->shop_list_page = false;
        $this->single_item_page = true;
    }
    public function back()
    {

        $this->shop_list_page = true;
        $this->single_item_page = false;
    }
}
