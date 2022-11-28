<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Registration\Item;

class RegistrationItemController extends Controller
{
    public function index()
    {
        return view('Registration.item_index');
    }

    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $counter = 0;

            while($counter < $request->quantity) {
                $item = new Item;
                $item->name_item = $request->name_item;
                $item->description = $request->description;
                $item->status = 0;
                $item->save();
                
            $counter++;
            }
        });
    
        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('registration_item');
    }
}
