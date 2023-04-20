<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('_equipo')->insert([
            [
                'nombre_equipo' => "Barcelona",
                'nombre_director_equipo' => "José Quiñonez",
                'logo_equipo' => "barcelona.jpg",
                'estado' => 1
            ],
            [
                'nombre_equipo' => "Real Madrid",
                'nombre_director_equipo' => "Darwin Quinteros",
                'logo_equipo' => "rm.png",
                'estado' => 1
            ],
            [
                'nombre_equipo' => "United City",
                'nombre_director_equipo' => "Agusto Zambrano",
                'logo_equipo' => "logo.jpg",
                'estado' => 1
            ],
            [
                'nombre_equipo' => "Cheelse",
                'nombre_director_equipo' => "Samuel Rivas",
                'logo_equipo' => "cheelse.png",
                'estado' => 1
            ],
            [
                'nombre_equipo' => "Psg",
                'nombre_director_equipo' => "Federico Paez",
                'logo_equipo' => "federico.png",
                'estado' => 1
            ]
        ]);
    }
}
