<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Nombre de Usuario',
            'email' => 'usuario@example.com',
            'password' => bcrypt('contraseña'),
            'addres' => 'Dirección de Prueba',
            'phone' => '123456789',
            'creditcard' => 1234567890123456,
        ]);

        // Puedes crear más usuarios si lo deseas
        User::factory(5)->create(); // Esto creará 10 usuarios adicionales utilizando el Factory de User
    }
}


