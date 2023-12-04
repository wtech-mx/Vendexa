<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = DB::table('categorias')->pluck('id')->toArray();
        $subcategorias = DB::table('subcategorias')->pluck('id')->toArray();

        $productos = [];

        foreach ($categorias as $categoriaId) {
            foreach ($subcategorias as $subcategoriaId) {
                $productos[] = [
                    'nombre' => "Producto de Categoría {$categoriaId} y Subcategoría {$subcategoriaId}",
                    'descripcion' => 'Descripción del producto',
                    'id_categoria' => $categoriaId,
                    'id_subcategoria' => $subcategoriaId,
                    'id_marca' => 1, // Reemplaza 1 con el ID de la marca correspondiente
                    'id_proveedor' => 1, // Reemplaza 1 con el ID del proveedor correspondiente
                    'codigo_proveedor' => '123ABC',
                    'unidad_venta' => 'Unidad',
                    'stock' => 10,
                    'imagen_principal' => 'ruta/imagen.jpg',
                    'clave_sat' => '123456',
                    'sku' => 'SKU123',
                    'costo' => '100.00',
                    'visibilidad_estatus' => 'visible',
                    'precio_normal' => '150.00',
                    'precio_mayo' => '140.00',
                    'precio_descuento' => '120.00',
                    'fecha_inicio_desc' => '2023-01-01',
                    'fecha_fin_desc' => '2023-01-15',
                    'id_empresa' => 1, // Reemplaza 1 con el ID de la empresa correspondiente
                    'id_user' => 1, // Reemplaza 1 con el ID del usuario correspondiente
                    'id_woocommerce' => 1, // Reemplaza 1 con el ID de WooCommerce correspondiente
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('productos')->insert($productos);
    }
}
