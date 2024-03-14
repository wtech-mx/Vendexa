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
            'name' => 'Super admin',
            'telefono' => '5539907266',
            'correo' => 'usuario@dominio.com',
            'estatus_rol' => 'Superadmin_root',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'id_woocommerce' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
