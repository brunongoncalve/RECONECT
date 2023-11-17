<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.login');
    }

    public function store(Request $request) 
    {
        $credentials = $request->only(['email', 'password']);

        if(!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors('USUARIO OU SENHA INVALIDOS');
        }
        
        return redirect()->route('integra');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
