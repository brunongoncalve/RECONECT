<?php

namespace App\Http\Controllers\Movement_resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Registration\Item;
use App\Models\Registration\ItemMovement;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Item::where('status', 0)->get();
        $resourcesOut = ItemMovement::where('status', 1)
                                      ->orderBy('dt_in', 'DESC')
                                      ->get(); 
        return view('Movement_resources.resource_index')
               ->with('resources', $resources)
               ->with('resourcesOut', $resourcesOut);
    }

    public function selectItem(Request $request)
    {
        $loadItem = Item::find($request->param1);
        return response()->json($loadItem);
    }

    public function selectItemOut(Request $request)
    {
        $loadItemOut = ItemMovement::find($request->param1);
        $loadItemOut->item = $loadItemOut->itemOut()->get();
        return response()->json($loadItemOut);
    }

    public function exitItem(Request $request)
    {
        DB::transaction(function() use ($request) {
            if($request->id) {
                $exitItem = new ItemMovement;

                $exitItem->id_item = $request->id;
                $exitItem->responsible_in = $request->responsible_in;
                $exitItem->dt_in = date('Y-m-d H:i:s');
                $exitItem->dt_out = '';
                $exitItem->status = 1;

                DB::table('itens')
                    ->where('id', $request->id)
                    ->update(['status' => 1]);
            
                $exitItem->save();
            }
        });
            
        DB::transaction(function() use ($request) {
            if($request->id_out) {
                DB::table('itens001')
                    ->where('id', $request->id_out)
                    ->update(['dt_out' => date('Y-m-d H:i:s'),
                              'responsible_out' => $request->responsible_out, 
                              'status' => 0]);
            
                DB::table('itens')
                    ->where('id', $request->id_item_out)
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
