<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JugadorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'nombre_jugador' => $this->nombre_jugador,
            'posicion_jugador' => $this->posicion_jugador,
            'numero_jugador' => $this->numero_jugador,
            'id_equipo' => $this->id_equipo,
            'estado' => $this->estado
        ];
    }
}
