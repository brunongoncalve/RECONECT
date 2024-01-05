<?php

namespace App\Http\Controllers\Concierge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Concierge\EntryExitVehicle;
use App\Models\Concierge\Vehicle;

class ManagerController extends Controller
{
    public function index()
    {
        return view('Concierge.manager');
    }

    public function loadManager()
    {
        $loadManager = User::all();
        return view('Concierge.load_manager')
               ->with('loadManager', $loadManager);
    }

    public function selectManager(Request $request)
    {
        $selectManager = User::find($request->param1);
        return response()->json($selectManager);
    }

    public function loadVehicle()
    {
        $loadVehicle = Vehicle::all();
        return view('Concierge.load_vehicle')
               ->with('loadVehicle', $loadVehicle);
    }

    public function selectVehicle(Request $request)
    {
        $selectVehicle = Vehicle::find($request->param1);
        return response()->json($selectVehicle);
    }

    public function saveEntry(Request $request)
    {
        DB::transaction(function() use ($request) {
            if($request->param1)
                if($request->param5 == 'ENTRY') {
                    $saveEntryExit = new EntryExitVehicle;

                    $saveEntryExit->users_id    = $request->param3;
                    $saveEntryExit->port002_id  = $request->param4;
                    $saveEntryExit->car_in      = $request->param1;
                    $saveEntryExit->plate_in    = $request->param2;
                    $saveEntryExit->date_in     = date('Y-m-d H:i:s');
                    $saveEntryExit->status      = 2;
                    $saveEntryExit->car_out     = '';
                    $saveEntryExit->plate_out   = '';
                    $saveEntryExit->date_out    = '';
                    $saveEntryExit->responsible = auth()->user()->id;

                    if($request->param5 == 'ENTRY') {
                        DB::table('port002')
                            ->where('id', $request->param4)
                            ->update(['status' => 2]);          
                    }

                    $saveEntryExit->save();

                    Session::flash('mensagem', 'Entrada realizada com sucesso.');
                    return redirect()->route('manager');
                }
        });

        Session::flash('mensagem', 'Entrada realizada com sucesso.');
        return redirect()->route('manager');
    }

    public function saveExit(Request $request)
    {
        DB::transaction(function() use ($request) {
            if($request->param1 == TRUE) {
                DB::table('port001')
                    ->where('id', $request->param1)
                    ->update(['date_out'    =>  date('Y-m-d H:i:s'),
                              'plate_out'   => $request->param3,
                              'responsible' => auth()->user()->id,
                              'status' => 1]);
                    
                DB::table('port002')
                    ->where('id', $request->param2)
                    ->update(['status' => 1]);    

                    Session::flash('mensagem1', 'Saida realizada com sucesso.');
                    return redirect()->route('manager');
            }
        });

        return redirect()->route('manager');
    }

    public function flow(Request $request)
    {
        $flow = EntryExitVehicle::where('status', 2)->get();
        return view('Concierge.manager')
               ->with("flow", $flow);
    }
}
