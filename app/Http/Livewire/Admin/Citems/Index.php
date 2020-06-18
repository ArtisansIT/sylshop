<?php

namespace App\Http\Livewire\Admin\Citems;

use App\Admin\Citem;
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
        return view(
            'livewire.admin.citems.index',
            [
                'citems' => $this->search === null ?
                    Citem::where([
                        ['deleted_at', null],
                    ])->get() :
                    Citem::where([
                        ['name', 'like', '%' . $this->search . '%'],
                        ['deleted_at', null],
                    ])->get()
            ]
        );
    }

    public function editcitem($payment)
    {
        $this->emit('editcitem', $payment);
    }

    public function inactivecitem($payment)
    {
        $this->emit('inactivecitem', $payment);
    }
}
