<?php

namespace App\Http\Livewire\Admin\Productrequest;

use App\Admin\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;

class ImageCreate extends Component
{
    use WithFileUploads;


    public $photo; // photo submit variable
    public $imageName; // photo submit variable of Image select

    public $image_id;

    public function mount($image_id)
    {
        $this->image_id = $image_id;
        // dd($this->pro_id);
    }
    public function render()
    {
        return view('livewire.admin.productrequest.image-create');
    }

    public function imageSubmit()
    {
        $data = Image::findOrfail($this->image_id);
        $this->resizeImage();
        $data->update([
            'url' => $this->imageName,
        ]);

        $this->emit('refreshAfterImageUpdate');
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
