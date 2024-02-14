<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;

include_once('../vendor/sirv/sirv-rest-api-php/sirv.api.class.php');

class HotelController extends Controller
{

    function index() {
        
        return Hotel::All()->toJson();
    }

    function hotels(Request $request) {       

        return Hotel::paginate(1);
    }

    function randomName() {
        $chars = "abcdefghijklmnopqrstuvwxyz123456789_";
        $name = "";
        for($i=0; $i<10; $i++)
        $name.= $chars[rand(0,strlen($chars))];
        return $name;
    }

    function uploadImg($localPath) {

        // check token expire date
        $sirv = new \SirvAPIClient(
            'ZRndx10UFEOXj1BWK5bjoSQbrtg',
            'h3t31hoxi0TaduGBv5I3kwA3jUD2vr+QJSLZTSOrd8qJCiCEJiJJUSz2xn+CTdcxZkXDtZtL18j8N7e7yKoPHg==',
            '',
            '',
            'Sirv PHP client'
        );
 
        $randomName = $this->randomName();
        $remotePath = 'Imgproj/'.$randomName.'.jpg';
        $sirv->uploadFile($localPath, $remotePath);
        $url = 'https://fpalandalus.sirv.com/'.$remotePath;
        return $url;
    }

    function store(Request $request) {

        extract($request->all());
        $hotel = new Hotel();
        $hotel->nombre = $nombre;
        $hotel->direccion = $direccion;
        $hotel->provincia = $provincia;
        $hotel->municipio = $municipio;
        $hotel->telefono = $telefono;
        $hotel->imagen = null; // $this->uploadImg($imagen->getPathName()); sin uso de momento la imagen del hotel
        $hotel->save();

       return redirect()->to('/room/create/'.$hotel->id);
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
        $hotel->imagen = null; // check this
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

        return view('admin.hotel.new');
    }
}