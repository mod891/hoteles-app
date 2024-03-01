<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
 

class ReservaController extends Controller
{
    function store(Request $request) {

        extract($request->all());
        $userId = $request->user()->id;

        $reserva = new Reserva();
        $reserva->room_id = $roomId;
        $reserva->user_id = $userId; 
        $reserva->fecha_ini = $fechaIni; 
        $reserva->fecha_fin = $fechaFin; 
        $reserva->dias = $dias; 
        $reserva->precio = $precio; 

        $reserva->save();
        return response()->json(['success' => true]);

    }

    function delete(Request $request) {
        $idReserva = explode('/',$request->getRequestUri())[3];
        $reserva = Reserva::find($idReserva);
        $reserva->delete();
        return response('',204);
    }

    function pdf(Request $request) {
        $data = $request->all();
       // dd($data,$request);
        $idReserva = explode('/',$request->getRequestUri())[2];

        $reserva = Reserva::find($idReserva);
        $room = Room::find($reserva->room_id);
        $user = $request->user()->getAttributes();

        $data = $reserva->getAttributes();
        $data['hotel'] = $room->hotel->getAttributes();
        $data['room'] = $room->getAttributes();
        $data['room']['fumadores'] =  $data['room']['fumadores']== 1? 'fumadores, ':'no fumadores, ';
        $data['room']['balcon'] =  $data['room']['balcon']== 1? 'con balcon, ':'sin balcon, ';
        $data['room']['minibar'] =  $data['room']['minibar']== 1? 'con minibar, ':'sin minibar, ';
        $data['room']['cama_matrimonio'] =  $data['room']['cama_matrimonio']== 1? 'cama de matrimonio, ':'cama simple, ';
        $data['room']['minicadena_wifi'] =  $data['room']['minicadena_wifi']== 1? 'con minicadena wifi ':'sin minicadena wifi ';
        $data['user'] = $user;
       $pdf = Pdf::loadView('user.reservaPdf',compact('data'));
 
        return $pdf->download();
    }


    function reservedList(Request $request) {

        $userId = $request->user()->id;
       
        $fecha = (new \DateTime())->format('Y-m-d');
        //DB::enableQueryLog(); dd(DB::getQueryLog());
        $reservas = DB::table('reservas')
            ->whereRaw('user_id = ?  and (`fecha_ini` > ? or `fecha_fin` > ?)',[$userId,$fecha,$fecha])
            ->get();
        $cards = [];
        $html = "";
        
        for ($i=0; $i<sizeof($reservas); $i++) {
            
            $cards[] = [
                'id' => $reservas[$i]->id,
                'url' => 'hotel/'.Reserva::find($reservas[$i]->id)->room()->first()->hotel()->first()->id,
                'text1' => 'Reserva ',
                'pdf' => 'reserva/'.$reservas[$i]->id.'/pdf',
                'nombre' => Reserva::find($reservas[$i]->id)->room()->first()->hotel()->first()->nombre,
                'imagen' => Reserva::find($reservas[$i]->id)->room()->get()[0]->hotel()->first()->imagen,
                'fechaIni' => (new \DateTime($reservas[$i]->fecha_ini))->format('d/m/Y'),
                'fechaFin' => (new \DateTime($reservas[$i]->fecha_fin))->format('d/m/Y'),
                'precio' => $reservas[$i]->precio
            ];
        
            $html .= View::make("components.cardReserva")->with("data", $cards[$i])->render();        
        }
 
        echo $html;
    }

    function visitedList(Request $request) {

        $userId = $request->user()->id;
        
        $reservas = DB::table('reservas')
            ->where([
                ['user_id','=',$userId],
                ['fecha_fin','<',(new \DateTime())->format('Y-m-d')]
            ])
            ->get();

        $cards = [];
        $html = "";
        for ($i=0; $i<sizeof($reservas); $i++) {
            $cards[] = [
                'id' => null,
                'url' => 'hotel/'.Reserva::find($reservas[$i]->id)->room()->first()->hotel()->first()->id,
                'text1' => 'Visitado',
                'pdf' => 'reserva/'.$reservas[$i]->id.'/pdf',
                'nombre' => Reserva::find($reservas[$i]->id)->room()->first()->hotel()->first()->nombre, // check
                'imagen' => Reserva::find($reservas[$i]->id)->room()->get()[0]->hotel()->first()->imagen, // check
                'fechaIni' => (new \DateTime($reservas[$i]->fecha_ini))->format('d/m/Y'),
                'fechaFin' => (new \DateTime($reservas[$i]->fecha_fin))->format('d/m/Y'),
                'precio' => $reservas[$i]->precio
            ];
        
            $html .= View::make("components.cardReserva")->with("data", $cards[$i])->render();        
        }
 
        echo $html;
    }

    function visitados(Request $request) {

        return view('user.visitados');
    }

    function reservas(Request $request) {

        return view('user.reservas');
    }
    
}
