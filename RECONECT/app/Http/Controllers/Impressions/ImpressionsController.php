<?php

namespace App\Http\Controllers\Impressions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImpressionsController extends Controller
{
    public function index()
    {
        return view('Impressions.impressions');
    }
}
