<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->level === 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->level === 'User') {
                return redirect()->route('user.dashboard');
            }
        }

        return view('login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->level === 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->level === 'User') {
                return redirect()->route('user.dashboard');
            } else {
                // Auth::logout();
                // dd('test');
                return redirect()->route('login')->with('login_error', 'Level tidak dikenali.');
            }
        }

        return redirect()->route('login')
            ->with('login_error', 'Email atau Password salah, Silahkan coba lagi')
            ->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
