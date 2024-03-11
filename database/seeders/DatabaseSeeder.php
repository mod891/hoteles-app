<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
 
    public function run(): void
    {
        
   
        $this->call([UsersSeeder::class]);
        $this->call([HotelsSeeder::class]);
        $this->call([ReservasSeeder::class]);
        $this->call([FavoritosSeeder::class]);

    }
}
