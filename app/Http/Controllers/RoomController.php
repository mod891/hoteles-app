<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\View;
include_once('../vendor/sirv/sirv-rest-api-php/sirv.api.class.php');

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
      $habitacion->minicadena_wifi = $minicadenaWifi;
      $habitacion->balcon = $balcon;
      $habitacion->cama_matrimonio = $camaMatrimonio;
      $habitacion->precio = $precio;
      $habitacion->imagen = $this->uploadImg($imagen->getPathName());
      $habitacion->save();
      return redirect()->back()->with('popup','habitacion'); // extra -> añadir algun tipo de verificacion prevent cualquiera llame a popup
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
      $remotePath = 'Imgproj/hab-'.$randomName.'.jpg';
      $sirv->uploadFile($localPath, $remotePath);
      $url = 'https://fpalandalus.sirv.com/'.$remotePath;
      return $url;
  }

  function rooms(Request $request) {
    $habitaciones = Room::all();

    $html = "";
    // filtros → $habitaciones
    $cards = [];

    for ($i=0; $i<sizeof($habitaciones); $i++) {
      $cards[] = [
        'url' => 'room/'.$habitaciones[$i]->id,
        'nombre' => $habitaciones[$i]->hotel()->get()[0]->nombre,
        'imagen' => $habitaciones[$i]->imagen.'?w=180',
        'municipio' => $habitaciones[$i]->hotel()->get()[0]->municipio,
        'provincia' => $habitaciones[$i]->hotel()->get()[0]->provincia,
        'precio' => $habitaciones[$i]->precio
      ];
    
      $html .= View::make("components.card")->with("data", $cards[$i])->render();
    } 
    echo $html;
  }

  function ficha(Request $request) {
    $id = explode('/',$request->getRequestUri())[2];
    $obj = Room::find($id);

    $habitacion = $obj->getAttributes();
    $habitacion['nombre'] = $obj->hotel()->get()[0]->nombre;
    $habitacion['municipio'] = $obj->hotel()->get()[0]->municipio;
    $habitacion['provincia'] = $obj->hotel()->get()[0]->provincia;

    return view('user.fichaHabitacion',compact('habitacion'));
  }

  function inicio(Request $request) {

    return view('user.inicio');
  }

}
