<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.register');
    }

    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $data = $request->except(['_token']);
            $senha = $data['password'] = Hash::make($data['password']);

            $user = new User;
            
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $senha;
            
            $user->save();
        });

        Session::flash('mensagem', 'USUARIO CADASTRADO COM SUCESSO');
        return redirect()->route('register');
    }
}
