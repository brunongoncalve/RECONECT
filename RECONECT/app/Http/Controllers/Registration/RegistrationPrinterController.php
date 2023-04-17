<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Registration\Printer;

class RegistrationPrinterController extends Controller
{
    public function index()
    {
        return view('Registration.impressions_index');
    }

    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $printer = new Printer;

            $printer->name_printer   = $request->name_printer;
            $printer->status         = 1;
            $printer->date_create    = date('Y-m-d H:i:s');
            $printer->save();
        });
    
        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('registration_printer');
    }
}
