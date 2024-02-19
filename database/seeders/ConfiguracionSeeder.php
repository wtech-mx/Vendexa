<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_configuracion')->insert([
            'img_enero' => 'enero.jpg',
            'img_febrero' => 'febrero.jpg',
            'img_marzo' => 'marzo.jpg',
            'img_abril' => 'abril.jpg',
            'img_mayo' => 'mayo.jpg',
            'img_junio' => 'junio.jpg',
            'img_julio' => 'julio.jpg',
            'img_agosto' => 'agosto.jpg',
            'img_septiembre' => 'septiembre.jpg',
            'img_octubre' => 'octubre.jpg',
            'img_noviembre' => 'noviembre.png',
            'img_diciembre' => 'diciembre.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}



