<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Registration\Group;

class RegistrationGroupController extends Controller
{
    public function index()
    {
        return view('Registration.group_index');
    }

    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $group = new Group;

            $group->name_group       = $request->name_group;
            $group->description      = $request->description;
            $group->status           = 0;
            $group->save();
        });
    
        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('registration_group');
    }
}
