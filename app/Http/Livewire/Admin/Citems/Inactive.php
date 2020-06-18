<?php

namespace App\Http\Livewire\Admin\Citems;

use App\Admin\Citem;
use Livewire\Component;

class Inactive extends Component
{
    public $search;
    public function render()
    {
        return view(
            'livewire.admin.citems.inactive',
            [

                'citems' => $this->search === null ?
                    Citem::onlyTrashed()->get() :
                    Citem::Where([
                        ['name', 'like', '%' . $this->search . '%'],
                    ])->onlyTrashed()->get()

            ]
        );
    }

    public function restore($citem)
    {
        $this->emit('restore', $citem);
    }
    public function forceDelete($citem)
    {
        $this->emit('forceDelete', $citem);
    }
}
