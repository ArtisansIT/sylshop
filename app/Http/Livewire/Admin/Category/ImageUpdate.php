<?php

namespace App\Http\Livewire\Admin\Category;


use Livewire\Component;

class ImageUpdate extends Component
{

    public function render()
    {
        return view('livewire.admin.category.image-update');
    }

    public function submitImage($category)
    {
        $this->emit('submitImage', $category);
    }
}
