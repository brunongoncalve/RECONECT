<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class BirthdayController extends Controller
{
    public function index()
    {
        $birthdays = new User;
        $birthdays = User::all();
        return view('RH.birthday_index')
               ->with('birthdays', $birthdays);
    }
}
