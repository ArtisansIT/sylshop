<?php

namespace App\Http\Livewire\Front\Partials;

use App\Admin\like;
use Livewire\Component;

class ProductLike extends Component
{
    public $like;
    public $count;
    public $product;
    public $like_status;
    public $initial_status;
    public $unlike_status;
    public $update_like;

    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.front.partials.product-like', [
            'like_count_by_user' =>  like::where([
                ['product_id', $this->product],
                ['user_id', auth()->user()->id],
                ['like', true],
            ])->count(),
            'like_count' =>  like::where([
                ['product_id', $this->product],
                ['like', true],
            ])->count(),

        ]);
    }

    public function like()
    {
        $data = $this->count_like_exist_for_like_unlike_function(false);
        // dd($data);
        if (empty($data)) {

            like::create([
                'product_id' => $this->product,
                'user_id' =>  auth()->user()->id,
                'like' => true
            ]);
        } else {
            $data->update([
                'like' => true
            ]);
        }
    }
    public function unlike()
    {
        $data = $this->count_like_exist_for_like_unlike_function(true);


        $data->update([
            'like' => false
        ]);
    }

    public function count_like_exist_for_like_unlike_function($status)
    {
        return  like::where([
            ['product_id', $this->product],
            ['user_id',  auth()->user()->id],
            ['like', $status]
        ])->first();
    }
}
