<?php

namespace App\Http\Livewire\Front\Pages;

use App\Admin\Category;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class Index extends Component
{
    public $categorys;
    public $firstCategory;
    public $dealCategory;
    public function mount()
    {
        $this->firstCategory = Category::first();
        $this->categorys = Category::with('image', 'products', 'products.image', 'products.shop')
            ->where('popular', true)->get();

        $this->dealCategory = Category::with(['products' => function ($query) {
            $query->whereHas('adons', function (Builder $query) {
                $query->where('today_offer', true);
            })->get();
        }])->get();
    }




    public function render()
    {
        return view('livewire.front.pages.index');
    }

    public function addToCart($productId)
    {
        $this->emit('addToCart', $productId);
    }

    // public function cartOverload()
    // {
    //     $this->alart();
    // }
    // public function alart()
    // {
    //     alert()->success('SuccessAlert', 'Lorem ipsum dolor sit amet.');
    // }
}
