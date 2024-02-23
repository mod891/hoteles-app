<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HotelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotel1 = new Hotel([
            "nombre" => "Almeria Fiesta",
            "direccion" => "C/ las Lomas de Montesino 23",
            "municipio" => "Almeria",
            "provincia" => "Almeria",
            "telefono" => "+34675484785",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/5x132f9iult1.jpg",

        ]);
        $hotel2 = new Hotel([
            "nombre" => "Cayosa del pino",
            "direccion" => "C/ Salvador 55",
            "municipio" => "Alhama de Granada",
            "provincia" => "Granada",
            "telefono" => "958756858",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/IPyJtS8FTJ.jpg",

        ]);

        $hotel3 = new Hotel([
            "nombre" => "Huelvates jolgorio",
            "direccion" => "C/ Albuquerque 67",
            "municipio" => "Aracena",
            "provincia" => "Huelva",
            "telefono" => "958756858",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/qDfziSZRoV.jpg",

        ]);

        $hotel1->saveOrFail();
        $hotel2->saveOrFail();
        $hotel3->saveOrFail();

        $room1 = new Room([
            "hotel_id" => $hotel1->id,
            "fumadores" => 1,
            "minibar" => 1,
            "minicadena_wifi" => 0,
            "balcon" => 1,
            "cama_matrimonio" => 1,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama de matrimonio",
            "precio" => 140.00,
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
        ]);
        
        $room4 = new Room([
            "hotel_id" => $hotel3->id,
            "fumadores" => 1,
            "minibar" => 1,
            "minicadena_wifi" => 1,
            "balcon" => 1,
            "cama_matrimonio" => 1,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 150.00,
        ]);
        
        $room5 = new Room([
            "hotel_id" => $hotel3->id,
            "fumadores" => 1,
            "minibar" => 1,
            "minicadena_wifi" => 1,
            "balcon" => 0,
            "cama_matrimonio" => 1,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 170.00,
        ]);

        $room1->saveOrFail();
        $room2->saveOrFail();
        $room3->saveOrFail();
        $room4->saveOrFail();
        $room5->saveOrFail();


    }
}
