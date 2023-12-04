<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nombre del Usuario',
            'email' => '5539907266',
            'correo' => 'usuario@dominio.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'id_direccion' => 1, // Reemplaza 1 con el ID de la dirección correspondiente
            'id_empresa' => 1, // Reemplaza 1 con el ID de la empresa correspondiente
            'id_woocommerce' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
