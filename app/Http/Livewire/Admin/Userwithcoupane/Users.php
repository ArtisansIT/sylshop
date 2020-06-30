<?php

namespace App\Http\Livewire\Admin\Userwithcoupane;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;

    public $goto_user_page;
    public $addCoinToUser_page;
    public $search;
    // public $userss;

    protected $listeners = [
        'backToMainComponent',

    ];
    public function mount()
    {
        $this->goto_user_page = true;
        $this->addCoinToUser_page = false;
        $this->search = request()->query('search', $this->search);
        // $this->userss = User::where('role_id', 1)->paginate(1);
    }
    public function resetPage()
    {
        $this->goto_user_page = false;
        $this->addCoinToUser_page = false;
    }
    public function render()
    {
        return view(
            'livewire.admin.userwithcoupane.users',
            [
                'users' => $this->search === null ?
                    User::with('coupanes')->where('role_id', 1)->paginate(10) :
                    User::with('coupanes')->where([
                        ['name', 'like', '%' . $this->search . '%'],
                        ['role_id', 1]
                    ])->paginate(10)
            ]
        );
    }

    public function addCoineToUser($user)
    {
        $this->resetPage();
        $this->addCoinToUser_page = true;
        $this->emit('addCoinToUser', $user);
    }

    public function backToMainComponent()
    {
        $this->resetPage();
        $this->goto_user_page = true;
    }
}
