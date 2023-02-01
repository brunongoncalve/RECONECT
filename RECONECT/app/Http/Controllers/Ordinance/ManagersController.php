<?php

namespace App\Http\Controllers\Ordinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Ordinance\Manager;
use App\Models\User;

class ManagersController extends Controller
{
    public function index()
    {
        return view('Ordinance.managers_index');
    }

    public function loadManager()
    {
        $loadManager = User::all();
        return view('Ordinance.load_manager')
               ->with('loadManager', $loadManager);
    }

    public function selectManager(Request $request)
    {
        $selectManager = User::find($request->param1);
        return response()->json($selectManager);
    }

    public function saveEntryExit(Request $request)
    {
        DB::transaction(function() use ($request) {
            if($request->btn_entry == 'ENTRY') {
                $saveEntry = new Manager;

                $saveEntry->users_id       = $request->id;
                $saveEntry->car_in         = $request->car;
                $saveEntry->sign_in        = $request->sign;
                $saveEntry->date_in        = date('Y-m-d H:i:s');
                $saveEntry->car_out        = '';
                $saveEntry->sign_out       = '';
                $saveEntry->date_out       = '';
                $saveEntry->status         = 0;
                $saveEntry->responsible    = auth()->user()->id;
                $saveEntry->save();
            }
        });

        Session::flash('mensagem', 'ENTRADA REALIZADA COM SUCESSO');
        return redirect()->route('managers');
    }

    public function flowDay()
    {
        $flowDay = new Manager;
        $flowDay = Manager::all();
        return view('Ordinance.managers_index')
               ->with('flowDay', $flowDay);
    }
}
