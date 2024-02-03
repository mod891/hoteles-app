<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;

class HotelController extends Controller
{

    function index() {
        return Hotel::All()->toJson();
    }

    function store(Request $request) {

        extract($request->all());
        $hotel = new Hotel();
        $hotel->nombre = $nombre;
        $hotel->direccion = $direccion;
        $hotel->provincia = $provincia;
        $hotel->municipio = $municipio;
        $hotel->telefono = $telefono;
        $hotel->imagen = null; // TODO curl img upload service get link
        $hotel->save();
       return redirect()->to('/');
    }

    function hotels(Request $request) {       

        return Hotel::paginate(1);
    }

    function delete(Request $request) {
       
       $id = $request->id;
       $hotel = Hotel::find($id);
       $hotel->delete();
       return response()->json(['success' => true]);
    }
    
    function edit(Request $request) {

        extract($request->all());
        $hotel = Hotel::find($id);
        $hotel->nombre = $nombre;
        $hotel->direccion = $direccion;
        $hotel->provincia = $provincia;
        $hotel->municipio = $municipio;
        $hotel->telefono = $telefono;
        $hotel->imagen = null; // TODO curl img upload service get link
        $hotel->save(); 
        return response()->json(['success' => true]);  
    }

    function editForm(Request $request) {

        $id = explode('/',$request->getRequestUri())[3];
        $obj = Hotel::find($id);
        $hotel = $obj->getAttributes();
        return view('hotel.edit',compact('hotel'));
    }

    function createForm(Request $request) {

        return view('hotel.new');
    }
}