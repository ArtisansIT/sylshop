<?php

namespace App\Http\Livewire;

use App\Admin\Shop;
use App\Admin\Category;
use Livewire\Component;


class ShopCreate extends Component
{

  
    public $categorys;
    public $shopid ;
    public $name;
    public $category;
    public $address;
    public $link;
    public $about;
    public $shipping;
    public $formsubmit;
    public $image;
    public $status;

    public function mount()
    {
        $this->categories();
        $this->formsubmit = true;
        $this->image = false;
        
    }

   

    

    public function render()
    {
        return view('livewire.shop-create');
    }

    public function categories()
    {
        $this->categorys = Category::all();
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'address' => 'required',
            'link' => 'required',
            'about' => 'required',
            'shipping' => 'required',
        ]); 

        $this->shopid = Shop::create([
            'name' => $this->name,
            'category_id' => $this->category,
            'address' => $this->address,
            'link' => $this->link,
            'about' => $this->about,
            'shipping' => $this->shipping,
        ]);

        

        $this->name = '';
        $this->category = '';
        $this->address = '';
        $this->link = '';
        $this->about = '';
        $this->shipping = '';

        session()->flash('message', 'Post successfully updated.');

        $this->image = true;
        $this->formsubmit = false;
        

       
    }

    // public function status(){
        
    //    $this->shopid->status = true;
    //     $this->shopid->save();
      

    // }
}
