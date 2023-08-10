<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email|string',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $this->validate();
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            toastr()->success('Login Berhasil');
            return redirect()->route('home');
        }
 
        toastr()->error('Email atau password salah');
        return redirect()->back();
    }
    
}
