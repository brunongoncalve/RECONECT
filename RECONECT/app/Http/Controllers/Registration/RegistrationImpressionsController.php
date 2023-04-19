<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Registration\Impression;
use App\Models\Registration\Printer;

class RegistrationImpressionsController extends Controller
{
    public function index()
    {
        $printer = Printer::all();
        return view('Registration.impressions_index')
               ->with('printer', $printer);
    }

    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $impression = new Impression;

            $impression->name_printer    = $request->name_printer;
            $impression->status          = 1;
            $impression->date_create     = date('Y-m-d H:i:s');
            $impression->save();
        });
    
        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('registration_printer');
    }
}
