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
        $admin = new User([
            "nombre" => "admin",
            "apellidos" => "sys admin",
            "email" => "admin@admin.com",
            "telefono" => "+34675685875",
            "password" => Hash::make("admin"),
            "rol" => "admin",
        ]);
        $user1 = new User([
            "nombre" => "david",
            "apellidos" => "qwerty uiuop",
            "email" => "david@gmail.com",
            "telefono" => "+34623468817",
            "password" => Hash::make("pass"),
        ]);
        $user2 = new User([
            "nombre" => "Rodrigo",
            "apellidos" => "Garrido Martínez",
            "email" => "rodrigo@gmail.com",
            "telefono" => "+34619501678",
            "password" => Hash::make("rodrigo"),
        ]);
        $user3 = new User([
            "nombre" => "Gerardo",
            "apellidos" => "Montoya Estribalez",
            "email" => "gerardo@gmail.com",
            "telefono" => "+34623567885",
            "password" => Hash::make("gerardo"),
        ]);
        $admin->saveOrFail();
        $user1->saveOrFail();
        $user2->saveOrFail();
        $user3->saveOrFail();


    }
}
