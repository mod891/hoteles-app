<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = "admin";
        
        $user = new User([
            "nombre" => "admin",
            "apellidos" => "sys admin",
            "email" => "admin@hoteles-app.com",
            "telefono" => "+34675685875",
            "password" => Hash::make($password),

        ]);

        $user->saveOrFail();
    }
}
