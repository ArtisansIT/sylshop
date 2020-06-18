<?php

namespace App\Http\Livewire\Front\Pages\Dashboard;

use App\Admin\Citem;
use App\Admin\Comment as AdmonComment;
use App\Admin\Orderdetails;
use Livewire\Component;

use function GuzzleHttp\Promise\all;

class Comment extends Component
{

    public $product;
    public $citems;


    public $reviewQuote;
    public $shortComment;
    public $rating;

    public function mount($product)
    {
        $this->product = $product;
        $this->citems = Citem::all();
    }
    public function render()
    {
        return view('livewire.front.pages.dashboard.comment');
    }

    public function saveComment()
    {
        $this->validate([
            'reviewQuote' => 'required',
            'rating' => 'required',

        ]);
        AdmonComment::create([
            'citem_id' => $this->reviewQuote,
            'user_id' => auth()->id(),
            'product_id' => $this->product['product_id'],
            'order_id' =>  $this->product['order_id'],
            'details' =>  $this->shortComment,
            'rating' =>  $this->rating,
        ]);
        $data = Orderdetails::findOrFail($this->product['id']);
        $data->update([
            'comment' => true
        ]);

        $this->backPage();
    }

    public function back_to_single_page()
    {
        $this->backPage();
    }

    public function backPage()
    {
        $this->emit('singleOrder_component_bacame_live_from_commentpage');
    }
}
