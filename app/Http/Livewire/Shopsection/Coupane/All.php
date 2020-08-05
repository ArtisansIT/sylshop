<?php

namespace App\Http\Livewire\Shopsection\Coupane;

use App\Admin\Coupane;
use Livewire\Component;

class All extends Component
{

    public $search;
    public $record;
    public $all_coupane_page, $edit_page;

    protected $listeners = [

        'backToEditCoupane' => 'back',
    ];
    public function mount()
    {
        $this->all_coupane_page = true;
        $this->edit_page = true;
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.shopsection.coupane.all', [
            'coupanes' => $this->search === null ?
                Coupane::where([
                    ['deleted_at', null],
                ])->get() :
                Coupane::where([
                    ['name', 'like', '%' . $this->search . '%'],
                    ['deleted_at', null],
                ])->get()
        ]);
    }

    public function edit_coupane($coupane)
    {
        $this->record = Coupane::findOrFail($coupane);
        $this->all_coupane_page = false;
        $this->edit_page = true;
    }

    public function back()
    {
        $this->all_coupane_page = true;
        $this->edit_page = false;
    }

    public function softDelete_coupane($id)
    {
        Coupane::findOrfail($id)->delete();
    }
}
