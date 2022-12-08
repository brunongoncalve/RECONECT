<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RegistrationUserController extends Controller
{
    public function index()
    {
        return view('Registration.user_index');
    }

    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $senha = $request->password = Hash::make($request->password);

            $user = new User;

            $user->name          = $request->name;
            $user->email         = $request->email;
            $user->password      = $senha;
            $user->birth         = $request->birth;
            $user->department    = $request->department;

            if($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $photo = $request->photo;
                $extension = $photo->extension();
                $photoName = md5($photo->getClientOriginalName() . strtotime("now") . "." . $extension);
                $photo->move(public_path('img/profile'), $photoName);

                $user->photo = $photoName;
            }
    
            $user->save();
        });
    
        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('registration_user');
    }
}
