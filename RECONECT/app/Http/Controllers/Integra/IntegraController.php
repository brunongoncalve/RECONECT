<?php

namespace App\Http\Controllers\Integra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntegraController extends Controller
{
    public function index()
    {
        return view('Integra.integra');
    }
}
