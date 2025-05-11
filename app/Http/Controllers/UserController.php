<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index() {
        // dd(Auth::user()->level);
        $locationA = ['latitude' => -5.13630434611842, 'longitude' => 119.47777598711976]; // istanbul,,  
        $locationB = ['latitude' => -5.136439352077125, 'longitude' => 119.47791190640497]; // berlin,  
        $jaraknya=Helper::howLong($locationA,$locationB);
        return view('user.dashboard',compact('jaraknya'));
    }

    public function data_absen() {
        return view('user.dataabsen');
    }
}
