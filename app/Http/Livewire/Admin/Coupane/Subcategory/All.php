<?php

namespace App\Http\Livewire\Admin\Coupane\Subcategory;

use App\Admin\Coupane;
use Livewire\Component;

class All extends Component
{
    public
        $all_subcategory,
        $inactive_list_subcategory,
        $edit_subcategory;
    public $search;
    public $coupane_id;

    protected $listeners = [
        'backToCategoryCoupane',
        'subcategory_inactive_list',
        'inactive_back_form_subcategory'
    ];

    public function render()
    {
        return view('livewire.admin.coupane.subcategory.all', [
            'coupanes' =>  $this->search === null ?
                Coupane::with('category')->where([
                    ['category_id', '!=', null],
                    ['shop_id', '!=', null],
                    ['subcategory_id', '!=', null],
                    ['user_id', null]
                ])->get() :
                Coupane::with('category')->where([
                    ['category_id', '!=', null],
                    ['shop_id', '!=', null],
                    ['subcategory_id', '!=', null],
                    ['user_id', null],
                    ['name', 'like', '%' . $this->search . '%']
                ])->get()
        ]);
    }

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->all_subcategory = true;
        $this->edit_subcategory = false;
        $this->inactive_list_subcategory = false;
    }

    public function edit_coupane($id)
    {
        $this->coupane_id = $id;
        $this->all_subcategory = false;
        $this->inactive_list_subcategory = false;
        $this->edit_subcategory = true;
    }

    public function backToCategoryCoupane()
    {
        $this->edit_subcategory = false;
        $this->inactive_list_subcategory = false;
        $this->all_subcategory = true;
    }
    public function inactive_back_form_subcategory()
    {
        $this->edit_subcategory = false;
        $this->inactive_list_subcategory = false;
        $this->all_subcategory = true;
    }
    public function subcategory_inactive_list()
    {
        $this->all_subcategory = false;
        $this->edit_subcategory = false;
        $this->inactive_list_subcategory = true;
    }

    public function softDelete_coupane($id)
    {
        Coupane::findOrfail($id)->delete();
    }
}
