<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jugador = Jugador::where('estado',1)->get();
        return response()->json($jugador,200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'nombre_jugador' => 'required',
            'posicion_jugador' => 'required',
            'numero_jugador' => 'required',
            'id_equipo' => 'required'
        ]);

        $jugador = new Jugador();
        $jugador->nombre_jugador = $validData['nombre_jugador'];
        $jugador->posicion_jugador = $validData['posicion_jugador'];
        $jugador->numero_jugador = $validData['numero_jugador'];
        $jugador->id_equipo = $validData['id_equipo'];
        $jugador->estado = 1;
        $jugador->save();
        return response()->json([$jugador,'message' => 'Jugador Guardado Correctamente.'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jugador = Jugador::find($id);

        if (is_null($jugador)) {
            return response()->json(['msg' => 'Jugador No Encontrado.','err' => true],404);
        }

        return response()->json($jugador,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jugador = Jugador::find($id);

        if (is_null($jugador)) {
            return response()->json(["msg" => "Jugador No Encontrado","err" => true],404);
        }

        return response()->json($jugador,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $jugador = Jugador::find($id);
        
        if (is_null($jugador)) {
            return response()->json(["msg" => "Jugador No Encontrado","err" => true]);
        }

        $validData = $request->validate([
            'nombre_jugador' => 'required',
            'posicion_jugador' => 'required',
            'numero_jugador' => 'required',
            'id_equipo' => 'required'
        ]);

        $jugador->nombre_jugador = $validData['nombre_jugador'];
        $jugador->posicion_jugador = $validData['posicion_jugador'];
        $jugador->numero_jugador = $validData['numero_jugador'];
        $jugador->id_equipo = $validData['id_equipo'];
        $jugador->estado = 1;
        $jugador->save();

        return response()->json($jugador,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jugador = Jugador::find($id);

        if (is_null($jugador)) {
            return response()->json(["msg" => "Jugador No Encontrado.","err" => true]);
        }

        // si quiero eliminarlo de manera logica

        $jugador->estado = false;
        $jugador->save();

        // Si quiero eliminarlo de manera permanente fisca

        $jugador->delete();

        return response()->json(['msg' => "Jugador Eliminado Correctamente.","err" => false]);
    }
}
