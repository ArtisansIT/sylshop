<?php

namespace App\Http\Livewire\Shopsection\Imagesection;

use Livewire\Component;

class Index extends Component
{

    public $index_inage_banner;
    public $image_page;
    public $banner_page;

    public function mount()
    {
        $this->index_inage_banner = true;
        $this->image_page = false;
        $this->banner_page = false;
    }
    public function render()
    {
        return view('livewire.shopsection.imagesection.index');
    }

    public function image()
    {
        $this->index_inage_banner = false;
        $this->banner_page = false;
        $this->image_page = true;
    }
}
