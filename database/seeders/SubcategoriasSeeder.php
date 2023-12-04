<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = DB::table('categorias')->pluck('id')->toArray();

        $subcategorias = [];

        foreach ($categorias as $categoriaId) {
            for ($i = 1; $i <= 2; $i++) {
                $subcategorias[] = [
                    'nombre' => "Subcategoría {$i} de Categoria {$categoriaId}",
                    'id_categoria' => $categoriaId,
                    'id_empresa' => 1, // Reemplaza 1 con el ID de la empresa correspondiente
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('subcategorias')->insert($subcategorias);
    }
}
