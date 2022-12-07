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
            $senha = $request->password = Hash::make($request->password);
            dd($request->file('photo'));
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $senha;

            if($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $photo = $request->photo;
                $extension = $photo->extension();
                $photoName = md5($photo->getClientOriginalName() . strtotime("now") . "." . $extension);
                $photo->move(public_path('img/profile'), $photoName);
                $user->photo = $photoName;
            }
    
            $user->save();
        });

        Session::flash('mensagem', 'USUARIO CADASTRADO COM SUCESSO');
        return redirect()->route('register');
    }
}
