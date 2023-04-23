<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = "_equipo";
    public $fillable = ['nombre_equipo','nombre_director_equipo','logo_equipo','estado'];
    public $timestamps = false;
}
