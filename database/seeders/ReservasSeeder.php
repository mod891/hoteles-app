<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Reserva;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $visitado1 = new Reserva([
            "room_id" => 3,
            "user_id" => 2,
            "fecha_ini" => "2024-01-25",
            "fecha_fin" => "2024-01-26",
            "dias" => 1,
            "precio" => 120.00,
        ]);
        $reserva1 = new Reserva([
            "room_id" => 2,
            "user_id" => 2,
            "fecha_ini" => "2024-03-20",
            "fecha_fin" => "2024-03-27",
            "dias" => 7,
            "precio" => 240.00,
        ]);
        $reserva2 = new Reserva([
            "room_id" => 3,
            "user_id" => 2,
            "fecha_ini" => "2024-04-10",
            "fecha_fin" => "2024-04-17",
            "dias" => 7,
            "precio" => 360.00,
        ]);
        $reserva3 = new Reserva([
            "room_id" => 3,
            "user_id" => 3,
            "fecha_ini" => "2024-06-15",
            "fecha_fin" => "2024-06-19",
            "dias" => 4,
            "precio" => 360.00,
        ]);

        $visitado1->saveOrFail();
        $reserva1->saveOrFail();
        $reserva2->saveOrFail();
        $reserva3->saveOrFail();

     /* 
        $reservaN = new Reserva([
            "room_id" => ,
            "user_id" => ,
            "fecha_ini" => "",
            "fecha_fin" => "",
            "dias" => ,
            "precio" => ,
        ]); 
        $reserva2 = new Hotel([
            "nombre" => "Barracedo",
            "direccion" => "C/ Salvador 55",
            "municipio" => "Alhama de Granada",
            "provincia" => "Granada",
            "telefono" => "958756858",
            "imagen" => null,
        ]);

        $hotel1->saveOrFail();
        $hotel2->saveOrFail();

        $room1 = new Room([
            "hotel_id" => $hotel1->id,
            "fumadores" => 1,
            "minibar" => 1,
            "minicadena_wifi" => 0,
            "balcon" => 1,
            "cama_matrimonio" => 1,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama de matrimonio",
            "precio" => 140.00,
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/hab-gtnjivyk3m.jpg",
        ]);

        $room2 = new Room([
            "hotel_id" => $hotel1->id,
            "fumadores" => 0,
            "minibar" => 1,
            "minicadena_wifi" => 0,
            "balcon" => 0,
            "cama_matrimonio" => 0,
            "descripcion" => "con minibar, con cama individual",
            "precio" => 80.00,
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/hab-wwd4gvcnp3.jpg",
        ]);

        $room3 = new Room([
            "hotel_id" => $hotel2->id,
            "fumadores" => 1,
            "minibar" => 1,
            "minicadena_wifi" => 0,
            "balcon" => 1,
            "cama_matrimonio" => 0,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 120.00,
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/hab-jctg1crjwg.jpg",
        ]);
        
        $room1->saveOrFail();
        $room2->saveOrFail();
        $room3->saveOrFail();
        */
    }
}
