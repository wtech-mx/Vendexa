<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empresas')->insert([
            'nombre' => 'WebTech',
            'telefono' => '1234567890',
            'correo' => 'correo@webtech.com',
            'referencia' => 'Referencia de la Empresa',
            'giro' => 'Giro de la Empresa',
            'id_direccion' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
