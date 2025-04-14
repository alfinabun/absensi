<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }
    public function setting() {
        return view('admin.setting');
    }
    public function datapegawai() {
        return view('admin.datakaryawan');
    }
    public function kehadiran() {
        return view('admin.kehadiran');
    }
    
 
}
