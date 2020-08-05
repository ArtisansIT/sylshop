<?php

namespace App\Http\Livewire\Shopsection\Imagesection;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;

class Image extends Component
{
    use WithFileUploads;
    public $photo;
    public $imageName;

    public function render()
    {
        return view('livewire.shopsection.imagesection.image', [
            'img' => auth()->user()->shop->image
        ]);
    }

    public function imageSubmit()
    {
        \File::delete('images/' . $this->imageLink()->url);
        $this->resizeImage();
        $this->imageLink()->update([
            'url' => $this->imageName,
        ]);
        $this->photo = '';
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

    public function imageLink()
    {
        return  auth()->user()->shop->image;
    }
}
