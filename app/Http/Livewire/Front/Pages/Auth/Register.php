<?php

namespace App\Http\Livewire\Front\Pages\Auth;

use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Register extends Component
{

    public $form = [
        'name' => '',
        'password' => '',
        'confirmation' => '',
    ];

    public $email;
    public $phone;
    public function render()
    {
        return view('livewire.front.pages.auth.register');
    }

    public function viewLoginPage()
    {
        $this->emit('viewLoginPage');
    }



    public function registaion_submit()
    {



        $this->validate([
            'phone' => 'required|numeric|regex:/(01)[0-9]{9}/|unique:users',
            'form.password' => 'required|min:8',
            'form.name' => 'required|string|max:255',
            'email' => 'required|email|string|unique:users|max:255',
        ]);

        User::create([
            'name' => $this->form['name'],
            'password' => $this->form['password'],
            'email' => $this->email,
            'phone' => $this->phone,

        ]);

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
