<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FormAlterPhotoRequest;
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
                $photoName = uniqid() . '.jpeg';
                $photo->move(public_path('img/profile'), $photoName);
                $user->photo     = $photoName;
            }
    
            $user->save();
        });
    
        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('registration_user');
    }

    public function profile(Request $request)
    {
       return view('Integra.profile');
    }

    public function alterPhoto(FormAlterPhotoRequest $request)
    {
        DB::transaction(function() use ($request) {
            $user = User::where('id', auth()->user()->id)->get();
            $user1 = json_decode($user);
            $dirFile = public_path('img/profile/' . $user1[0]->photo);

            if($request->btn_save_profile == 'btn_save_profile') {
                if(file_exists($dirFile)) {
                    unlink($dirFile);
                }
                    if($request->hasFile('alter_photo') && $request->file('alter_photo')->isValid()) {
                        $photo       = $request->alter_photo;
                        $photoName   = uniqid() . '.jpeg';
                        $photo->move(public_path('img/profile'), $photoName);

                        DB::table('users')
                            ->where('id', auth()->user()->id)
                            ->update(['photo' => $photoName]);
                    }
            }
        });

        Session::flash('mensagem', 'ALTERAÇÃO REALIZADA COM SUCESSO');
        return redirect()->route('profile');
    }
}
