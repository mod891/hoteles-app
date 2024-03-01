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
            "nombre" => "Calle del aceitunar",
            "direccion" => "C/ Salvador 55",
            "municipio" => "Alhama de Granada",
            "provincia" => "Granada",
            "telefono" => "958756858",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/IPyJtS8FTJ.jpg",

        ]);

        $hotel3 = new Hotel([
            "nombre" => "",
            "direccion" => "C/ de Huelva 12",
            "municipio" => "Aracena",
            "provincia" => "Huelva",
            "telefono" => "958756858",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/baq7n4ciAU.jpg",

        ]);

        $hotel4 = new Hotel([
            "nombre" => "Cambrills Miravet",
            "direccion" => "C/ Baltea nº 35",
            "municipio" => "Santa Oliva",
            "provincia" => "Tarragona",
            "telefono" => "977436698",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/gC9kUFBupZ.jpg",

        ]);

        $hotel5 = new Hotel([
            "nombre" => "Quismondo",
            "direccion" => "C/ Guateque del ciervo 23",
            "municipio" => "Torrenueva",
            "provincia" => "Ciudad Real",
            "telefono" => "926142589",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/HV70r1X5JF.jpg",

        ]);

        $hotel6 = new Hotel([
            "nombre" => "La girocleta",
            "direccion" => "C/ catalan nº 53",
            "municipio" => "Vilablareix",
            "provincia" => "Girona",
            "telefono" => "653267467",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/5uWYD0uCZk.jpg",

        ]);

        $hotel7 = new Hotel([
            "nombre" => "El pardao",
            "direccion" => "C/ Yosi Domínguez",
            "municipio" => "Ourense",
            "provincia" => "Ourense",
            "telefono" => "888554757",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/C4HnEV0c4e.jpg",

        ]);

        $hotel8 = new Hotel([
            "nombre" => "Los torlinos",
            "direccion" => "C/ becerrós 54",
            "municipio" => "Beceite",
            "provincia" => "Teruel",
            "telefono" => "978602676",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/gySI5krXVh.jpg",

        ]);

        $hotel9 = new Hotel([
            "nombre" => "Manquez Gurnón",
            "direccion" => "C/ Sotomonte del arébalo 62",
            "municipio" => "Atarfe",
            "provincia" => "Granada",
            "telefono" => "958153364",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/z3Na3w5cKr.jpg",

        ]);

        $hotel10 = new Hotel([
            "nombre" => "El pinar",
            "direccion" => "C/ Rama viva 64",
            "municipio" => "Bárboles",
            "provincia" => "Zaragoza",
            "telefono" => "976790559",
            "imagen" => "https://fpalandalus.sirv.com/Imgproj/p5fCQESybo.jpg",

        ]);

        $hotel1->saveOrFail();
        $hotel2->saveOrFail();
        $hotel3->saveOrFail();
        $hotel4->saveOrFail();
        $hotel5->saveOrFail();
        $hotel6->saveOrFail();
        $hotel7->saveOrFail();
        $hotel8->saveOrFail();
        $hotel9->saveOrFail();
        $hotel10->saveOrFail();

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

        $room6 = new Room([
            "hotel_id" => $hotel4->id,
            "fumadores" => 0,
            "minibar" => 1,
            "minicadena_wifi" => 0,
            "balcon" => 1,
            "cama_matrimonio" => 1,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 120.00,
        ]);
        $room7 = new Room([
            "hotel_id" => $hotel5->id,
            "fumadores" => 0,
            "minibar" => 1,
            "minicadena_wifi" => 0,
            "balcon" => 0,
            "cama_matrimonio" => 0,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 100.00,
        ]);
        $room8 = new Room([
            "hotel_id" => $hotel6->id,
            "fumadores" => 0,
            "minibar" => 1,
            "minicadena_wifi" => 0,
            "balcon" => 0,
            "cama_matrimonio" => 1,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 140.00,
        ]);
        $room9 = new Room([
            "hotel_id" => $hotel7->id,
            "fumadores" => 1,
            "minibar" => 1,
            "minicadena_wifi" => 1,
            "balcon" => 1,
            "cama_matrimonio" => 1,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 190.00,
        ]);
        $room10 = new Room([
            "hotel_id" => $hotel8->id,
            "fumadores" => 1,
            "minibar" => 1,
            "minicadena_wifi" => 1,
            "balcon" => 1,
            "cama_matrimonio" => 0,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 210.00,
        ]);
        $room11 = new Room([
            "hotel_id" => $hotel9->id,
            "fumadores" => 0,
            "minibar" => 0,
            "minicadena_wifi" => 1,
            "balcon" => 0,
            "cama_matrimonio" => 0,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 110.00,
        ]);
        $room12 = new Room([
            "hotel_id" => $hotel10->id,
            "fumadores" => 0,
            "minibar" => 1,
            "minicadena_wifi" => 0,
            "balcon" => 1,
            "cama_matrimonio" => 0,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 150.00,
        ]);
        $room13 = new Room([
            "hotel_id" => $hotel9->id,
            "fumadores" => 0,
            "minibar" => 0,
            "minicadena_wifi" => 1,
            "balcon" => 0,
            "cama_matrimonio" => 1,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 185.00,
        ]);
        $room14 = new Room([
            "hotel_id" => $hotel6->id,
            "fumadores" => 0,
            "minibar" => 1,
            "minicadena_wifi" => 1,
            "balcon" => 1,
            "cama_matrimonio" => 1,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 210.00,
        ]);
        $room15 = new Room([
            "hotel_id" => $hotel5->id,
            "fumadores" => 0,
            "minibar" => 1,
            "minicadena_wifi" => 1,
            "balcon" => 0,
            "cama_matrimonio" => 0,
            "descripcion" => "se puede fumar, con minibar, con balcón, con cama individual",
            "precio" => 100.00,
        ]);

        $room1->saveOrFail();
        $room2->saveOrFail();
        $room3->saveOrFail();
        $room4->saveOrFail();
        $room5->saveOrFail();
        $room6->saveOrFail();
        $room7->saveOrFail();
        $room8->saveOrFail();
        $room9->saveOrFail();
        $room10->saveOrFail();
        $room11->saveOrFail();
        $room12->saveOrFail();
        $room13->saveOrFail();
        $room14->saveOrFail();
        $room15->saveOrFail();



    }
}
