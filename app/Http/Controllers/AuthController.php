<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{

    public function index() {

        if (Auth::check()) {
        
            return view('landingPage');
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
            return redirect()->route('landingPage')
                ->withSuccess('Login Correcto');
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