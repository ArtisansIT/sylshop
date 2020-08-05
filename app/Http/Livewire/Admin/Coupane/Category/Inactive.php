<?php

namespace App\Http\Livewire\Admin\Coupane\Category;

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
        return view('livewire.admin.coupane.category.inactive', [

            'coupanes' => $this->search === null ?
                Coupane::where([
                    ['category_id', '!=', null],
                    ['shop_id', null],
                    ['subcategory_id', null],
                    ['user_id', null]
                ])->onlyTrashed()->get() :
                Coupane::where([
                    ['category_id', '!=', null],
                    ['shop_id', null],
                    ['subcategory_id', null],
                    ['user_id', null],
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
