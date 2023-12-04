<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $direcciones = [];

        for ($i = 1; $i <= 5; $i++) {
            $direcciones[] = [
                'pais' => 'Nombre del País',
                'estado' => 'Nombre del Estado',
                'colonia' => "Colonia {$i}",
                'codigo_postal' => "1234{$i}",
                'alcaldia' => "Alcaldía {$i}",
                'calle_numero' => "Calle y Número {$i}",
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('direcciones')->insert($direcciones);
    }
}
