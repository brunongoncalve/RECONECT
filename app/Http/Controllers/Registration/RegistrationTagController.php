<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Integra\Tag;

class RegistrationTagController extends Controller
{
    public function index()
    {
        return view('Registration.tag_index');
    }

    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $group = new Tag;
            $group->users_id         = auth()->user()->id;
            $group->tag_name         = $request->tag_name;
            $group->save();
        });
    
        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('registration_tag');
    }
}
