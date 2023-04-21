<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = "_jugador";
    public $fillable = ['nombre_jugador','posicion_jugador','numero_jugador','id_equipo','estado'];
    public $timestamps = false;
}
