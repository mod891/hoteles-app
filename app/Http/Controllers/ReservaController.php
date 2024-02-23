<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


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


    function pdf(Request $request) {

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
                'url' => 'hotel/'.Reserva::find($reservas[$i]->id)->room()->first()->hotel()->first()->id,
                'text1' => 'Visitado',
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
/*
    function reservedDays(Request $request) {

        extract($request->all());
        $dias = [];
        $ini = null; 
        $reservas = DB::table('reservas')
            ->where('room_id',$room)->get();

        for ($i=0; $i<sizeof($reservas); $i++) {
            $ini = new \DateTime($reservas[$i]->fecha_ini);
            $ndias = $reservas[$i]->dias;
            for ($j=0; $j<$ndias; $j++) {
                $dias[] = $ini->format('Y-m-d');
                $ini->modify('+1 day');
            }
        }
        // las reservas pueden ser hechas solo dias consecutivos      
        return response()->json($dias);
    }
*/

    function visitados(Request $request) {

        return view('user.visitados');
    }

    function reservas(Request $request) {

        return view('user.reservas');
    }
    
}
