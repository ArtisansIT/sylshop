<?php

namespace App\Http\Livewire\Admin\Coupane\Category;

use App\Admin\Coupane;
use Livewire\Component;

class All extends Component
{


    public $all_category,
        $inactive_list_category,
        $edit_category;
    public $search;
    public $coupane_id;


    protected $listeners = [
        'backToCategoryCoupane',
        'category_inactive_list',
        'inactive_back_form_category'
    ];
    public function render()
    {
        return view('livewire.admin.coupane.category.all', [
            'coupanes' =>  $this->search === null ?
                Coupane::with('category')->where([
                    ['category_id', '!=', null],
                    ['shop_id', null],
                    ['subcategory_id', null],
                    ['user_id', null]
                ])->get() :
                Coupane::with('category')->where([
                    ['category_id', '!=', null],
                    ['shop_id', null],
                    ['subcategory_id', null],
                    ['user_id', null],
                    ['name', 'like', '%' . $this->search . '%']
                ])->get()
        ]);
    }

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->all_category = true;
        $this->edit_category = false;
        $this->inactive_list_category = false;
    }

    public function edit_coupane($id)
    {
        $this->coupane_id = $id;
        $this->all_category = false;
        $this->inactive_list_category = false;
        $this->edit_category = true;
    }

    public function backToCategoryCoupane()
    {
        $this->edit_category = false;
        $this->inactive_list_category = false;
        $this->all_category = true;
    }
    public function inactive_back_form_category()
    {
        $this->edit_category = false;
        $this->inactive_list_category = false;
        $this->all_category = true;
    }
    public function category_inactive_list()
    {
        $this->edit_category = false;
        $this->all_category = false;
        $this->inactive_list_category = true;
    }

    public function softDelete_coupane($id)
    {
        Coupane::findOrfail($id)->delete();
    }
}
