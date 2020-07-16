<?php

namespace App\Http\Livewire\Shopsection\Product;

use App\Admin\Image;
use App\Admin\Product;
use Livewire\Component;

class AllImages extends Component
{
    public $ProductWithAllImage;
    public $update_image_id;
    public $index_page_all_image;
    public $create_image_page;
    public $update_image_page;


    protected $listeners = [

        'back' => 'return_back_to_index',
        'back_after_create_new_photo',
    ];
    public function mount($product)
    {
        $this->index_page_all_image = true;
        $this->create_image_page = false;
        $this->update_image_page = false;
        $this->ProductWithAllImage = $product;
    }
    public function render()
    {
        return view('livewire.shopsection.product.all-images', [
            'product' =>  Product::with('image')
                ->findOrFail($this->ProductWithAllImage)
        ]);
    }

    public function return_back_to_index()
    {
        $this->index_page_all_image = true;
        $this->create_image_page = false;
        $this->update_image_page = false;
    }

    public function imageInsert()
    {
        $this->index_page_all_image = false;
        $this->update_image_page = false;
        $this->create_image_page = true;
    }


    public function image_update($image_id)
    {
        $this->update_image_id = $image_id;
        $this->index_page_all_image = false;
        $this->create_image_page = false;
        $this->update_image_page = true;
    }
    public function image_delete($image_id)
    {
        $data = Image::findOrFail($image_id);
        \File::delete('images/' . $data->url);
        $data->delete();
    }

    public function back_after_create_new_photo()
    {
        $this->index_page_all_image = true;
        $this->create_image_page = false;
        $this->update_image_page = false;
    }
}
