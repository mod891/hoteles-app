<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{

    public function index() {

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == "admin") {
                return redirect()->route('admin.dashboard');
            }
            else {
                return redirect()->route('landingPage');
            }
        }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        

       
        $request->validate([
            'email' => 'required',//admin@hoteles-app.com
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->rol == "admin") {
                return redirect()->route('admin.dashboard')
                    ->withSuccess('Login Correcto');
            } 
            else {
                return redirect()->route('user.inicio')
                ->withSuccess('Login Correcto');
            }
        }
     
        return back()->withErrors(['email' => 'Los datos introducidos no son correctos'])->onlyInput('email');
    }

    public function logout(Request $request) 
    {

        Session::flush();//
        Auth::logout();

        return redirect('/');
    }

}