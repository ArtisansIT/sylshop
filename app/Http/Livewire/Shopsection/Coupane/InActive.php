<?php

namespace App\Http\Livewire\Shopsection\Coupane;

use App\Admin\Coupane;
use Livewire\Component;

class InActive extends Component
{
    public $search;

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.shopsection.coupane.in-active', [

            'coupanes' => $this->search === null ?
                Coupane::onlyTrashed()->get() :
                Coupane::where('name', 'like', '%' . $this->search . '%')->onlyTrashed()->get()
        ]);
    }

    public function Restore_coupane($id)
    {
        Coupane::where('id', $id)->onlyTrashed()->first()->restore();
    }
    public function ParmanentDelete_coupane($id)
    {
        Coupane::where('id', $id)
            ->onlyTrashed()
            ->first()
            ->forceDelete();
    }
}
