<?php

namespace App\Http\Livewire\Admin\Coupane\User;

use App\Admin\Coupane;
use Livewire\Component;

class All extends Component
{

    public $all_user,
        $edit_user,
        $inactive_list_user;
    public $search;
    public $coupane_id;

    protected $listeners = [
        'backToUserCoupane',
        'user_inactive_list',
        'inactive_back_form_user'
    ];
    public function render()
    {
        return view('livewire.admin.coupane.user.all', [
            'coupanes' =>  $this->search === null ?
                Coupane::with('category')->where([
                    ['coin', '!=', null]
                ])->get() :
                Coupane::with('category')->where([
                    ['coin', '!=', null],
                    ['name', 'like', '%' . $this->search . '%']
                ])->get()
        ]);
    }

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->inactive_list_user = false;
        $this->edit_user = false;
        $this->all_user = true;
    }

    public function edit_coupane($id)
    {
        $this->coupane_id = $id;
        $this->inactive_list_user = false;
        $this->all_user = false;
        $this->edit_user = true;
    }

    public function inactive_back_form_user()
    {
        $this->edit_user = false;
        $this->inactive_list_user = false;
        $this->all_user = true;
    }

    public function backToUserCoupane()
    {
        $this->edit_user = false;
        $this->inactive_list_user = false;
        $this->all_user = true;
    }

    public function user_inactive_list()
    {
        $this->edit_user = false;
        $this->all_user = false;
        $this->inactive_list_user = true;
    }


    public function softDelete_coupane($id)
    {
        Coupane::findOrfail($id)->delete();
    }
}
