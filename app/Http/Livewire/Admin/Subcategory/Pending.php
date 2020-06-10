<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Admin\Subcategory;
use Livewire\Component;

class Pending extends Component
{

    public $search;

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.admin.subcategory.pending', [
            'subcategorys' => $this->search === null ?

                Subcategory::doesntHave('image')
                ->where([
                    ['deleted_at', null],
                    ['status', false],


                ])->get() :
                Subcategory::doesntHave('image')
                ->where([
                    ['deleted_at', null],
                    ['status', false],
                    ['name', 'like', '%' . $this->search . '%']
                ])
                ->get()
        ]);
    }

    public function pendingImage($shop)
    {
        $this->emit('pendingImage', $shop);
    }
}
