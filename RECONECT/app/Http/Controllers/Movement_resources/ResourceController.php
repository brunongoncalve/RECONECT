<?php

namespace App\Http\Controllers\Movement_resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Registration\Item;
use App\Models\Registration\ItemMovement;
use App\Models\User;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Item::where('status', 0)->get();
        $resourcesOut = ItemMovement::where('status', 1)->orderBy('dt_in', 'DESC')->get(); 
        return view('Movement_resources.resource_index')
               ->with('resources', $resources)
               ->with('resourcesOut', $resourcesOut);
    }

    public function loadUser()
    {
        $loadUser = new User;
        $loadUser = User::all();
        return view('Movement_resources.load_user')
               ->with('loadUser', $loadUser);
    }

    public function loadUserOut()
    {
        $loadUserOut = new User;
        $loadUserOut = User::all();
        return view('Movement_resources.load_user_out')
               ->with('loadUser', $loadUserOut);
    }

    public function selectUser(Request $request)
    {
        $selectUser = User::find($request->param1);
        return response()->json($selectUser);
    }

    public function selectUserOut(Request $request)
    {
        $selectUserOut = User::find($request->param1);
        return response()->json($selectUserOut);
    }

    public function selectItem(Request $request)
    {
        $selectItem = Item::find($request->param1);
        return response()->json($selectItem);
    }

    public function selectItemOut(Request $request)
    {
        $selectItemOut = ItemMovement::find($request->param1);
        $selectItemOut->item = $selectItemOut->itemOut()->get();
        return response()->json($selectItemOut);
    }

    public function exitItem(Request $request)
    {
        DB::transaction(function() use ($request) {
            if($request->id) {
                $exitItem = new ItemMovement;

                $exitItem->id_item              = $request->id;
                $exitItem->responsible_in       = $request->responsible_in;
                $exitItem->dt_in                = date('Y-m-d H:i:s');
                $exitItem->dt_out               = '';
                $exitItem->status               = 1;

                $exitItem->save();

                DB::table('itens')
                    ->where('id', $request->id)
                    ->update(['status' => 1]);
            }
        });
            
        DB::transaction(function() use ($request) {
            if($request->id_out) {
                DB::table('itens001')
                    ->where('id', $request->id_out)
                    ->update(['dt_out'           => date('Y-m-d H:i:s'),
                              'responsible_out'  => $request->responsible_out, 
                              'status'           => 0]);
            
                DB::table('itens')
                    ->where('id', $request->id_out)
                    ->update(['status' => 0]);
            } 
        });
  
        return redirect()->route('movement_resources');
    }

    public function resourcesReport()
    {
        $reports = new ItemMovement;
        $reports = ItemMovement::all();
        return view('Movement_resources.report')
               ->with('reports', $reports);
    }
}
