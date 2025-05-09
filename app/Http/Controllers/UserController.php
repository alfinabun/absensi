<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        // dd(Auth::user()->level);

        return view('user.dashboard');
    }

    public function data_absen() {
        return view('user.dataabsen');
    }
}
