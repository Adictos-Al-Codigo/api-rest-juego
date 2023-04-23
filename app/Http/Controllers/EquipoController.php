<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipo = Equipo::where('estado',1)->get();
        return response()->json($equipo,200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'nombre_equipo' => 'required',
            'nombre_director_equipo' => 'required',
            'logo_equipo' => 'required',
        ]);

        $equipo = new Equipo([
            'nombre_equipo' => $validData['nombre_equipo'],
            'nombre_director_equipo' => $validData['nombre_director_equipo'],
            'logo_equipo' => $validData['logo_equipo'],
            'estado' => 1
        ]);

        $equipo->save();

        return response()->json($equipo,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);

        if (is_null($equipo)) {
            return response()->json(["res" => "Equipo No Encontrado.","err" => true],404);
        }

        return response()->json([$equipo,"res" => "Equipo Encontrado.","err" => false],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $equipo = Equipo::find($id);

        if (is_null($equipo)) {
            return response()->json(["res" => "Equipo No Encontrado.","err" => true],404);
        }

        return response()->json($equipo,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $equipo = Equipo::find($id);

        if (is_null($equipo)) {
            return response()->json(["res" => "Equipo No Encontrado.","err" => true],404);
        }

        $validData = $request->validate([
            'nombre_equipo' => 'required',
            'nombre_director_equipo' => 'required',
            'logo_equipo' => 'required',
        ]);

        $equipo->nombre_equipo = $validData['nombre_equipo'];
        $equipo->nombre_director_equipo = $validData['nombre_director_equipo'];
        $equipo->logo_equipo = $validData['logo_equipo'];
        $equipo->estado = 1;
        $equipo->save();

        return response()->json($equipo,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);

        if (is_null($equipo)) {
            return response()->json(["res" => "Equipo No Encontrado.","err" => true],404);
        }

        $equipo->estado = 0;
        $equipo->save();

        return response()->json(["res" => "Equipo Eliminado.","err" => false],200);
    }
}
