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
        $user = new User([
            "nombre" => "david",
            "apellidos" => "abc def",
            "email" => "david@gmail.com",
            "telefono" => "+34623468817",
            "password" => Hash::make("pass"),
        ]);

        $admin->saveOrFail();
        $user->saveOrFail();
    }
}
