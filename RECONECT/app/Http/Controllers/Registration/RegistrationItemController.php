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
            $contador = 0;
            $item = new Item;
            
            while($contador <= $request->quantity) {
                
            $item->name_item = $request->name_item;
            $item->description = $request->description;
            $item->status = 0;
            
            if($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $file = $request->file('photo');
                $input = [
                    'photo' => $file
                    ];
       
                    $this->validate(request(), [
                       'document.*' => 'required|file|mimes:jpeg,jpg,png|max:204800',
                    ]);
       
                    $messages = [
                    'mimes' => 'Formato invalido'
                    ];
       
                    $validator = Validator::make($input, $messages);
       
                        if ($validator->fails()) {
                            return $validator->messages();
                        }
       
                    $name = uniqid() . '.jpeg';
            
            }
            $item->photo = $name;    
                
            $contador++;
        }

        $item->save();
        });
        

        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('registration_item');
    }
}
