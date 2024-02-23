<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Favorito;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
include_once('../vendor/sirv/sirv-rest-api-php/sirv.api.class.php');

class RoomController extends Controller
{
    function createForm(Request $request) {

        return view('admin.room.new');
    }

    
    function store(Request $request) {

      extract($request->all());
      $habitacion = new Room();
      $habitacion->hotel_id = $idHotel;
      $habitacion->descripcion = $descripcion;
      $habitacion->fumadores = $fumadores;
      $habitacion->minibar = $minibar;
      $habitacion->minicadena_wifi = $minicadenaWifi;
      $habitacion->balcon = $balcon;
      $habitacion->cama_matrimonio = $camaMatrimonio;
      $habitacion->precio = $precio;
      $habitacion->save();
      return redirect()->back()->with('popup','habitacion'); // extra -> añadir algun tipo de verificacion prevent cualquiera llame a popup
    }


}
