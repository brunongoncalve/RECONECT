<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Concierge\Vehicle;

class RegistrationVehicleController extends Controller
{
    public function index()
    {
        return view('Registration.vehicle_index');
    }

    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $vehicle = new Vehicle;

            $vehicle->name_car         = $request->name_car;
            $vehicle->plate            = $request->plate;
            $vehicle->status           = 1;
            if($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $photo = $request->photo;
                $photoName = uniqid() . '.jpeg';
                $photo->move(public_path('img/vehicle'), $photoName);
                $vehicle->photo     = $photoName;
            }

            $vehicle->save();
        });
    
        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('registration_vehicle');
    }
}
