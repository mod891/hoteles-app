<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->rol == "admin") {
                return view('admin.dashboard');
            }
            else {
                return redirect()->route('landingPage');
            }
        } else {
            return redirect()->route('login');
        }
    }
}