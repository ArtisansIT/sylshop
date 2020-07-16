<?php

namespace App\Http\Livewire\Shopsection\Subcategory;

use Livewire\Component;
use App\Admin\Subcategory;

class AllSubcategory extends Component
{

    public $search;


    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view(
            'livewire.shopsection.subcategory.all-subcategory',
            [
                'data' => $this->search === null ?
                    Subcategory::where([
                        ['deleted_at', null],
                        ['status', true],
                    ])->get() :
                    Subcategory::where([
                        ['name', 'like', '%' . $this->search . '%'],
                        ['deleted_at', null],
                        ['status', true],
                    ])->get()
            ]
        );
    }

    public function edit($subcategory)
    {
        $this->emit('SCFSSedit', $subcategory);
    }

    public function softDelete_subcategory($subcategory)
    {
        $this->emit('SCFSSsoftDelete_subcategory', $subcategory);
    }
    public function updateImage($shop)
    {
        $this->emit('SCFSSupdateImage', $shop);
    }
}
