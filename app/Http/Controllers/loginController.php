<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    
    public function index(){
    
         $user = Auth::user();
      
         if($user){
             return redirect()->route('dashboard');
 
         }
         return view('login');
      }
     
     public function proses_login (Request $request){
       
         $request->validate([
             'email'=>'required|email',
             'password'=>'required'
         ]);
         
         
         $credential = $request->only('email','password');
        //  $unamenya=User::where('email', $credential['email'])->first();
        //  dd($credential);
        //  dd(Auth::attempt($credential));
         
 
         if(Auth::attempt($credential)){
             $user =  Auth::user();
 
             return redirect()->route('dashboard');
         }
        //  Alert::alert('Gagal login', 'Username atau Password anda salah', 'error');
         return redirect()->route('login')->with('login_error', 'Email atau Password salah, Silahkan coba lagi')
             ->withInput();
      }

      public function logout(Request $request){
        // logout itu harus menghapus session nya 
        
                $request->session()->flush();
        
        // jalan kan juga fungsi logout pada auth 
        
                Auth::logout();
        // kembali kan ke halaman login
                return Redirect()->route('login');
              }
}
