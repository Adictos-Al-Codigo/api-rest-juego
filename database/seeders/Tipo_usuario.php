<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Tipo_usuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_usuarios')->insert([
            [
                'tipo' => "Admin",
                'descripcion' => "Administrador Para el Sitio Web.",
                'estado' => 1
            ],
            [
                'tipo' => "User",
                'descripcion' => "Usuario Para el Sitio Web o Invitados.",
                'estado' => 1
            ]
        ]);
    }
}
