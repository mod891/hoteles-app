<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    function index() {
        if (Auth::check() && Auth::user()->rol == "admin") {
            return redirect()->route('admin.dashboard');
        }
        else if (Auth::check() && Auth::user()->rol == "normal") {
            return redirect()->route('user.inicio');
        }
        return view('landingPage');
    }

    function inicio(Request $request) {

        return view('user.inicio');
    }
}
