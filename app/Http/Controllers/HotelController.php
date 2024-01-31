<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\Hotel;

class HotelController extends Controller
{

    function index() {

    }

    function store(Request $request) {
       dd($request->all());
       return redirect()->to('/');
    }
}