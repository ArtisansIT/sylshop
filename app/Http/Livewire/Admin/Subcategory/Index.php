<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Admin\Subcategory;
use Livewire\Component;

class Index extends Component
{

    public $search;


    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.admin.subcategory.index', [
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
        ]);
    }


    public function edit($subcategory)
    {
        $this->emit('edit', $subcategory);
    }


    public function softDelete_subcategory($subcategory)
    {
        $this->emit('softDelete_subcategory', $subcategory);
    }
    public function updateImage($shop)
    {
        $this->emit('updateImage', $shop);
    }
}
