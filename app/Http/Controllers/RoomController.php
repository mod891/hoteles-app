<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Favorito;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
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
      $habitacion->imagen = $this->uploadImg($imagen->getPathName());
      $habitacion->save();
      return redirect()->back()->with('popup','habitacion'); // extra -> añadir algun tipo de verificacion prevent cualquiera llame a popup
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

      $remotePath = 'Imgproj/hab-'.Str::random(10).'.jpg';
      $sirv->uploadFile($localPath, $remotePath);
      $url = 'https://fpalandalus.sirv.com/'.$remotePath;
      return $url;
  }

  function rooms(Request $request) {

    $dataFiltros = $request->all();
    $dbKey = ["camaMatrimonio"=>"cama_matrimonio","balcon" => "balcon","minibar" => "minibar","fumadores" => "fumadores","minicadenaWifi" => "minicadena_wifi"];
    $filtros = [];
    $habitaciones = null;
    $html = "";

    foreach ($dataFiltros as $key => $val) {
      if ($val['active']) 
        $filtros[] = [$dbKey[$key],'=',$val['value']]; 
    }
    if (sizeof($filtros) == 0) 
      $habitaciones = Room::all();
    else 
      $habitaciones = Room::where($filtros)->get();

    for ($i=0; $i<sizeof($habitaciones); $i++) {
      $hotel = $habitaciones[$i]->hotel()->first();
      $card = [
        'url' => 'room/'.$habitaciones[$i]->id,
        'nombre' => $hotel->nombre,
        'imagen' => $habitaciones[$i]->imagen.'?w=180',
        'municipio' => $hotel->municipio,
        'provincia' => $hotel->provincia,
        'precio' => $habitaciones[$i]->precio
      ];
    
      $html .= View::make("components.card")->with("data", $card)->render();
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


  function favoritos(Request $request) {
    return view('user.favoritos');
  }

  function favoritosList(Request $request) {
    $userId = $request->user()->id;
    $favoritos = Favorito::where('user_id',$userId)->get();
    $html = '';
    for ($i=0; $i<sizeof($favoritos); $i++) {
      $habitacion = Room::find($favoritos[$i]->room_id);
      $data = [
        'url' => 'room/'.$habitacion->id,
        'nombre' => $habitacion->hotel()->get()[0]->nombre,
        'imagen' => $habitacion->imagen.'?w=180',
        'municipio' => $habitacion->hotel()->get()[0]->municipio,
        'provincia' => $habitacion->hotel()->get()[0]->provincia,
        'precio' => $habitacion->precio
      ];
    
      $html .= View::make("components.card")->with("data", $data)->render();
    } 
   
    echo $html;
  }

  function favorito(Request $request) {

    extract($request->all());
    $userId = $request->user()->id; 
    $roomId = $room;

    $existe = DB::table('favoritos')->select(DB::raw('count(*) as existe'))->where([
      ['user_id', '=', $userId],
      ['room_id', '=', $roomId],
    ])->get()->first()->existe;

    return response()->json(['favorito' => $existe]);

  }

  function toogleFavorito(Request $request) {

    extract($request->all());
    $userId = $request->user()->id; 
    $roomId = $room;
    $status = 0;
    $action = '';
    // si existe borra, si no existe añade
    $existe = DB::table('favoritos')->select(DB::raw('count(*) as existe'))->where([
      ['user_id', '=', $userId],
      ['room_id', '=', $roomId],
    ])->get()->first()->existe;
  
    if ($existe == 0) {

      $favorito = new Favorito();
      $favorito->user_id = $userId;
      $favorito->room_id = $roomId;
      $favorito->save();
      $status = 201;
      
    } else if ($existe == 1) {

      $favorito = Favorito::where([
        ['user_id', '=', $userId],
        ['room_id', '=', $roomId],
      ])->delete();
      $status = 204;
     
    }

    return response('',$status);

  }
}
