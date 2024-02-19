<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ConfiguracionSeeder::class);
        // $this->call(EmpresasSeeder::class);
        // $this->call(UsersSeeder::class);
        // $this->call(CategoriasSeeder::class);
        // $this->call(SubcategoriasSeeder::class);
        // $this->call(MarcasSeeder::class);
        // $this->call(ProveedoresSeeder::class);
        // $this->call(ProductosSeeder::class);
        // $this->call(ClientesSeeder::class);
    }
}
