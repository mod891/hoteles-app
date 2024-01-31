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
        return view('landingPage');
    }
}
