<?php

namespace App\Http\Livewire\Shopsection\Subcategory;

use Livewire\Component;
use App\Admin\Subcategory;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;

class ImageUpdate extends Component
{
    use WithFileUploads;
    public $selected_id;
    public $photo;
    public $imageName;

    public function mount($selectedid)
    {
        $this->selected_id = $selectedid;
    }
    public function render()
    {
        return view('livewire.shopsection.subcategory.image-update');
    }

    public function submitForm()
    {
        $data = Subcategory::findOrFail($this->selected_id);

        $this->validate([
            'photo' => 'required|image|max:2048', // 1MB Max
        ]);

        \File::delete('images/' . $data->image->url);
        $this->resizeImage();
        $data->image->update([
            'url' => $this->imageName,
        ]);



        $this->emit('backToMainPage');
    }

    public function resizeImage()
    {
        $this->imageName  = $this->imageNameCreate();
        $imgPath = 'images/' . $this->imageName;
        ImageManagerStatic::make($this->photo)->resize(200, 100)->encode('jpg')->save($imgPath);
    }
    public function imageNameCreate()
    {
        return  time() . '_' . uniqid() . '_' . 'subcategory' . '.jpg';
    }
}
