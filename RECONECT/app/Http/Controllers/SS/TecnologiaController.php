<?php

namespace App\Http\Controllers\SS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TecnologiaController extends Controller
{
    public function index()
    {
        return view('SS.opening_called');
    }
}
