<?php

namespace App\Http\Livewire\Front\Pages\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $form = [
        'phone' => '',
        'password' => '',
    ];

    public $loginComponentIsActive;

    public function mount()
    {
        $this->loginComponentIsActive = true;
    }
    public function render()
    {
        return view('livewire.front.pages.auth.login');
    }



    public function submit()
    {


        $this->validate([

            'form.phone' => 'required|string|regex:/(01)[0-9]{9}/|max:11|',
            'form.password' => 'required|string',
        ]);
        Auth::attempt($this->form);
        $this->returnRedirect();
    }

    public function returnRedirect()
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return redirect()->intended('user/dashboard');
        } else {
            return redirect()->intended('admin/dashboard');
        }
    }
}
