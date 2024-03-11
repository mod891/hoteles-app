<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use App\Models\Favorito;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

include_once('../vendor/sirv/sirv-rest-api-php/sirv.api.class.php');

class HotelController extends Controller
{

    function index() {
        
        return Hotel::All()->toJson();
    }

    function hotels(Request $request) {       

        return Hotel::paginate(1);
    }

        
    function hotelsList(Request $request) {

        $dataFiltros = $request->all();
        $dbKey = ["camaMatrimonio"=>"cama_matrimonio","balcon" => "balcon","minibar" => "minibar","fumadores" => "fumadores","minicadenaWifi" => "minicadena_wifi"];
        $hoteles = null;
        $html = "";
        $andWhere = '';
        $hotelRooms = [];
        $cards = [];
        $urlData = null;
        $checks = [];
        $fechaIni = $dataFiltros['fechaIni'];
        $fechaFin = $dataFiltros['fechaFin'];
        $provincia = $dataFiltros['provincia'];
        $first = true;

        foreach ($dataFiltros as $key => $val) {
            if ($val == 1) {
                $andWhere .= $dbKey[$key].'=1 and '; 
                $checks[] = $key;
            }
        }
        $conn = DB::connection()->getPdo();

        if ($fechaFin == null && $fechaIni == null) { 
            $sql = "select hotel_id, id, precio from rooms order by precio desc";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } else {
            $first = false;
            $sql = "select hotel_id, id, precio from rooms where ".$andWhere." id not in (
                select room_id from reservas where ? between fecha_ini and fecha_fin or ?  between fecha_ini and fecha_fin) order by precio desc";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$fechaIni,$fechaFin]);
        }
        $disponiblesEnFecha = $stmt->fetchAll();
                
        for ($i=0; $i<sizeof($disponiblesEnFecha); $i++) {
            $hotelRooms[$disponiblesEnFecha[$i]['hotel_id']]['precio'] = $disponiblesEnFecha[$i]['precio'];
            $hotelRooms[$disponiblesEnFecha[$i]['hotel_id']]['rooms'][] = [ 'id' => $disponiblesEnFecha[$i]['id'], 'precio' => $disponiblesEnFecha[$i]['precio'] ];
        }
        
        foreach ($hotelRooms as $hotelId => $values) { 
            
            if ($first)  // primera carga inicio.html sin filtros
                $urlData = '';
            else {
                $urlData = [];
                $dias = intval((date_diff(new \DateTime($fechaIni), new \DateTime($fechaFin)))->format('%a'));
                $urlData['rooms'] = $values['rooms'];
                $urlData['fechas'] = ['fechaIni' => $fechaIni,'fechaFin' => $fechaFin, 'dias' => $dias ];
                $urlData = '?b='.base64_encode( json_encode($urlData) );
            }
            $hotel = Hotel::find($hotelId);

            $cards[] = [
                'url' => 'hotel/'.$hotel->id.$urlData,
                'nombre' => $hotel->nombre,
                'imagen' => $hotel->imagen,
                'municipio' => $hotel->municipio,
                'provincia' => $hotel->provincia,
                'habitaciones' => sizeof($values['rooms']) > 1? sizeof($values['rooms']).' habitaciones disponibles':sizeof($values['rooms']).' habitacion disponible',
                'idRooms' => $values['rooms'],
                'precio' => 'Desde '.$values['precio'].'€ la noche'
            ];

            if ($provincia != 0 && $hotel->provincia != $provincia) {
                array_pop($cards);
            }
        }

        if (!$first) {
            $html .= '<div>Hoteles disponibles para el '.(new \DateTime($fechaIni))->format('d/m/Y').' hasta el '.(new \DateTime($fechaFin))->format('d/m/Y');
            if ($provincia != 0)
                $html .=' en '.$provincia;
            if (sizeof($checks)>0) {
                $html .= ' con ';
                for ($i=0; $i<sizeof($checks); $i++)
                    $html .= $checks[$i].', ';
                $html = substr($html,0,-1);
            }
            $html .='</div>';
        }

        for ($i=0; $i<sizeof($cards); $i++) 
            $html .= View::make("components.card")->with("data", $cards[$i])->render();
        
        if (sizeof($cards) == 0)
            $html .="<p class='text-2xl mt-16 lg:mt-32 pb-24 lg:pb-56'>No existen hoteles con ese criterio</p>";
       
        echo $html;
    }


    function favorito(Request $request) {

        extract($request->all());
        $userId = $request->user()->id; 
        $hotelId = $hotel;
    
        $existe = DB::table('favoritos')->select(DB::raw('count(*) as existe'))->where([
          ['user_id', '=', $userId],
          ['hotel_id', '=', $hotelId],
        ])->get()->first()->existe;
    
        return response()->json(['favorito' => $existe]);
    
    }

    function toogleFavorito(Request $request) {

        extract($request->all());
        $userId = $request->user()->id; 
        $hotelId = $hotel;
        $status = 0;
        $action = '';
        // si existe borra, si no existe añade
        $existe = DB::table('favoritos')->select(DB::raw('count(*) as existe'))->where([
            ['user_id', '=', $userId],
            ['hotel_id', '=', $hotelId],
        ])->get()->first()->existe;

        if ($existe == 0) {

            $favorito = new Favorito();
            $favorito->user_id = $userId;
            $favorito->hotel_id = $hotelId;
            $favorito->save();
            $status = 201;
            
        } else if ($existe == 1) {

            $favorito = Favorito::where([
            ['user_id', '=', $userId],
            ['hotel_id', '=', $hotelId],
            ])->delete();
            $status = 204;
            
        }

        return response('',$status);

    }

    function favoritos(Request $request) {
        return view('user.favoritos');
      }
    
    function favoritosList(Request $request) {
        $userId = $request->user()->id;
        $favoritos = Favorito::where('user_id',$userId)->get();
        
        $html = '';
        for ($i=0; $i<sizeof($favoritos); $i++) {
            $hotel = Hotel::find($favoritos[$i]->hotel_id);
            
            $precio = 99999999;
           
            for ($j=0; $j<sizeof($hotel->rooms); $j++) {
                if ($hotel->rooms[$j]->precio < $precio)
                    $precio = $hotel->rooms[$j]->precio;
            }
            
            $data = [
                'url' => 'hotel/'.$hotel->id,
                'nombre' => $hotel->nombre,
                'imagen' => $hotel->imagen,
                'municipio' => $hotel->municipio,
                'provincia' => $hotel->provincia,
                'habitaciones' => sizeof($hotel->rooms).' habitaciones disponibles',
                'precio' => 'Desde '.$precio.'€ la noche'
            ];
            $html .= View::make("components.card")->with("data", $data)->render();
            
        } 
        echo $html;
    }

    function ficha(Request $request) {

        $id = explode('/',$request->getRequestUri())[2];
        $obj = Hotel::find($id);

        if ($obj == null) 
            return redirect()->to('/');
        
        $hotel = $obj->getAttributes();
        $habitaciones = $obj->rooms;
        
        for ($i=0; $i<sizeof($habitaciones); $i++) {
            $hotel['habitaciones'][] = [
                'id' => $habitaciones[$i]->id,
                'precio' => $habitaciones[$i]->precio,
            ];
        }

        return view('user.fichaHotel',compact('hotel'));
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
 
        $remotePath = 'Imgproj/'.Str::random(10).'.jpg';
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
        $hotel->imagen = $this->uploadImg($imagen->getPathName()); 
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

        if ($request->user()->rol != 'admin')
            return redirect()->back();

        extract($request->all());

        // imagen antigua, no hay que subir otra imagen distinta
        if (gettype($imagen) != "string" ) 
            $imagen = $this->uploadImg($imagen->getPathName());

        $hotel = Hotel::find($id);
        $hotel->nombre = $nombre;
        $hotel->direccion = $direccion;
        $hotel->provincia = $provincia;
        $hotel->municipio = $municipio;
        $hotel->telefono = $telefono;
        $hotel->imagen = $imagen; 
        $hotel->save(); 
        return response()->json(['success' => true]);  
    }

    function editForm(Request $request) {
        // forma correcta lib spatie roles middleware hasRole
        
        if ($request->user()->rol != 'admin')
            return redirect()->to('/');

        $id = explode('/',$request->getRequestUri())[3];
        $obj = Hotel::find($id);
        $hotel = $obj->getAttributes();
       // $hotel['imagen'] = explode('/',$hotel['imagen'])[4];
        return view('admin.hotel.edit',compact('hotel'));
    }

    function createForm(Request $request) {

        return view('admin.hotel.new');
    }

    function provincias(Request $request) {

        $provincias = DB::table('hotels')->select(DB::raw('distinct provincia'))->get();
        return response()->json($provincias);
    }
}