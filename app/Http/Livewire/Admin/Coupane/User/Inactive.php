<?php

namespace App\Http\Livewire\Admin\Coupane\User;

use App\Admin\Coupane;
use Livewire\Component;

class Inactive extends Component
{

    public $search;

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.admin.coupane.user.inactive', [

            'coupanes' => $this->search === null ?
                Coupane::where([
                    ['coin', '!=', null]
                ])->onlyTrashed()->get() :
                Coupane::where([
                    ['coin', '!=', null],
                    ['name', 'like', '%' . $this->search . '%']
                ])->onlyTrashed()->get()

        ]);
    }


    public function active($id)
    {
        Coupane::where('id', $id)->onlyTrashed()->first()->restore();
    }
    public function delete($id)
    {
        Coupane::where('id', $id)->onlyTrashed()->first()->forceDelete();
    }
}
