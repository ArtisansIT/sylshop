<?php

namespace App\Http\Livewire\Front\Partials;

use Livewire\Component;

class ProductLike extends Component
{
    public $product_id;
    public $like_status;
    public $initial_status;
    public $unlike_status;

    public function mount($product)
    {
        $this->initial_status = true;
        $this->product_id = $product;
    }
    public function render()
    {
        return view('livewire.front.partials.product-like');
    }
}
