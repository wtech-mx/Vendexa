<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresas = DB::table('empresas')->pluck('id')->toArray();

        $proveedores = [];

        foreach ($empresas as $empresaId) {
            for ($i = 1; $i <= 5; $i++) {
                $proveedores[] = [
                    'nombre' => "Proveedor {$i} de Empresa {$empresaId}",
                    'correo' => "proveedor{$i}@empresa{$empresaId}.com",
                    'telefono' => '1234567890',
                    'id_direccion' => 1,
                    'id_empresa' => $empresaId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('proveedores')->insert($proveedores);
    }
}
