<?php

namespace Database\Seeders;

use App\Models\Favorito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FavoritosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $favorito1 = new Favorito([
            'user_id' => '2',
            'hotel_id' => '4'
        ]);

        $favorito2 = new Favorito([
            'user_id' => '2',
            'hotel_id' => '8'
        ]);

        $favorito3 = new Favorito([
            'user_id' => '3',
            'hotel_id' => '1'
        ]);

        $favorito4 = new Favorito([
            'user_id' => '4',
            'hotel_id' => '9'
        ]);
        
        $favorito1->saveOrFail();
        $favorito2->saveOrFail();
        $favorito3->saveOrFail();
        $favorito4->saveOrFail();

    }
}