<?php

namespace App\Http\Livewire\Shopsection\Product;

use App\Admin\Image;
use App\Admin\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;

class ImageCreate extends Component
{

    use WithFileUploads;

    public $product;
    public $imageName;
    public $photo;

    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.shopsection.product.image-create');
    }

    public function submitForm()
    {
        $this->validate([

            'photo' => 'required|image|max:2048', // 1MB Max

        ]);
        $data = Product::findOrFail($this->product);
        $this->resizeImage();
        $data->image()->create([
            'url' => $this->imageName,
        ]);
        $this->emit('back_after_create_new_photo');
    }

    public function resizeImage()
    {
        $this->imageName  = $this->imageNameCreate();
        $imgPath = 'images/' . $this->imageName;
        ImageManagerStatic::make($this->photo)->resize(460, 460)->encode('jpg')->save($imgPath);
    }
    public function imageNameCreate()
    {
        return  time() . '_' . uniqid() . '_' . 'Product' . '.jpg';
    }
}
