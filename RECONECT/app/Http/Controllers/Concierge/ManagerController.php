<?php

namespace App\Http\Controllers\Concierge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
}
