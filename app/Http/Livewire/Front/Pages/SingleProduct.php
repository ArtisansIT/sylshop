<?php

namespace App\Http\Livewire\Front\Pages;

use App\Facades\Cart;
use App\Admin\Product;
use Livewire\Component;
use App\Admin\Variation;

class SingleProduct extends Component
{

    public $product;


    public $reviewCount;






    public function mount(Product $product)
    {

        $this->product = $product->load(
            'image',
            'subcategory',
            'shop',
            'category',
            'adons'

        );
        // dd($this->product);

        $this->viewIncrement();
    }
    public function render()
    {
        return view('livewire.front.pages.single-product', [
            'relatedproduct' => Product::with('image')
                ->where(
                    'subcategory_id',
                    $this->product->subcategory_id
                )->inRandomOrder()->get(),
        ]);
    }

    public function viewIncrement()
    {
        // $this->product->adons->view =  $this->product->adons->view + 1;
        $this->product->adons->update([
            'view' =>  $this->product->adons->view + 1
        ]);
    }
}
