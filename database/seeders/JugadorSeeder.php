<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JugadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('_jugador')->insert([
            [
                'nombre_jugador' => "Leonel Messi",
                'posicion_jugador' => "Delantero",
                'numero_jugador' => "10",
                'id_equipo' => 1,
                'estado' => 1
            ],
            [
                'nombre_jugador' => "Cristiano Ronaldo",
                'posicion_jugador' => "Mediocampista",
                'numero_jugador' => "5",
                'id_equipo' => 2,
                'estado' => 1
            ],
            [
                'nombre_jugador' => "Jahir Alexander",
                'posicion_jugador' => "Defensa",
                'numero_jugador' => "15",
                'id_equipo' => 3,
                'estado' => 1
            ],
            [
                'nombre_jugador' => "Maradona",
                'posicion_jugador' => "Lateral",
                'numero_jugador' => "28",
                'id_equipo' => 4,
                'estado' => 1
            ],
            [
                'nombre_jugador' => "Pique José",
                'posicion_jugador' => "Volante",
                'numero_jugador' => "45",
                'id_equipo' => 1,
                'estado' => 1
            ],
            [
                'nombre_jugador' => "Ronaldiño",
                'posicion_jugador' => "Delantero",
                'numero_jugador' => "7",
                'id_equipo' => 5,
                'estado' => 1
            ],
            [
                'nombre_jugador' => "Neymar Jr",
                'posicion_jugador' => "Extremo",
                'numero_jugador' => "12",
                'id_equipo' => 5,
                'estado' => 1
            ]
        ]);
    }
}
