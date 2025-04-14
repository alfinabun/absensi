<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    
    public function index() {
        return view('login');
    }
    public function login(Request $request) {
        // dd($request->all());

        if(Auth::attempt($request->only('email','password'))){
            return redirect('/admin');
        }else{
            echo "email atau password salah";
        return redirect('/');
        }
    }

    
}
