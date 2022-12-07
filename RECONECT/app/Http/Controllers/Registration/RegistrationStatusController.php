<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Registration\Status;

class RegistrationStatusController extends Controller
{
    public function index()
    {
        return view('Registration.status_index');
    }

    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $status = new Status;
            $status->name_status = $request->name_status;
            $status->description = $request->description;
            $status->status = 0;
            $status->save();
        });
    
        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('registration_status');
    }
}
