<?php

namespace App\Http\Livewire\Shopsection\Product;

use App\Admin\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;

class ImageUpdate extends Component
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
        return view('livewire.shopsection.product.image-update');
    }

    public function submitForm()
    {
        $this->validate([

            'photo' => 'required|image|max:2048', // 1MB Max

        ]);
        $data = Image::findOrFail($this->product);
        \File::delete('images/' . $data->url);
        $this->resizeImage();
        $data->update([
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
