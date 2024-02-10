<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    function createForm(Request $request) {

        return view('admin.room.new');
    }

    function store(Request $request) {

      $data = $request->all();
      extract($request->all());
      $habitacion = new Room();
      $habitacion->hotel_id = $idHotel;
      $habitacion->descripcion = $descripcion;
      $habitacion->fumadores = $fumadores;
      $habitacion->minibar = $minibar;
      $habitacion->balcon = $balcon;
      $habitacion->cama_matrimonio = $camaMatrimonio;
      $habitacion->precio = $precio;
      $habitacion->save();
      return redirect()->back()->with('popup','habitacion'); // extra -> añadir algun tipo de verificacion prevent cualquiera llame a popup
    }

}
