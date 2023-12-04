<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresas = DB::table('empresas')->pluck('id')->toArray();

        $marcas = [];

        foreach ($empresas as $empresaId) {
            for ($i = 1; $i <= 3; $i++) {
                $marcas[] = [
                    'nombre' => "Marca {$i} de Empresa {$empresaId}",
                    'id_empresa' => $empresaId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('marcas')->insert($marcas);
    }
}
