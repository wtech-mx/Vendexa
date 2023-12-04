<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $direcciones = DB::table('direcciones')->pluck('id')->toArray();
        $empresas = DB::table('empresas')->pluck('id')->toArray();
        $users = DB::table('users')->pluck('id')->toArray();

        $clientes = [];

        for ($i = 1; $i <= 5; $i++) {
            $clientes[] = [
                'nombre' => "Cliente {$i}",
                'telefono' => '1234567890',
                'correo' => "cliente{$i}@dominio.com",
                'id_direccion' => $direcciones[$i - 1], // Tomando direcciones existentes en orden
                'tipo' => 'Mayorista',
                'constancia_fiscal' => 'RIF123456789', // Puedes cambiar esto según tus necesidades
                'id_empresa' => $empresas[0], // Tomando la primera empresa, puedes ajustar según tus necesidades
                'id_user' => $users[0], // Tomando el primer usuario, puedes ajustar según tus necesidades
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('clientes')->insert($clientes);
    }
}
