<?php

namespace App\Http\Controllers;

use App\Http\Resources\JugadorResource;
use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jugador = DB::table('_jugador')
        ->join('_equipo','_jugador.id_equipo','=','_equipo.id')
        ->select('_jugador.id','_jugador.nombre_jugador','_jugador.posicion_jugador','_jugador.numero_jugador','_equipo.nombre_equipo','_equipo.nombre_director_equipo','logo_equipo')->where('_jugador.estado',1)->get();

        // return JugadorResource::collection($jugador);
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

        // return new JugadorResource(Jugador::create([
        //     'nombre_jugador' => $validData['nombre_jugador'],
        //     'posicion_jugador' => $validData['posicion_jugador'],
        //     'numero_jugador' => $validData['numero_jugador'],
        //     'id_equipo' => $validData['id_equipo'],
        //     'estado' => 1
        // ]));
        return response()->json($jugador,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jugador = Jugador::find($id);

        if (is_null($jugador)) {
            return response()->json(["msg" => "Jugador No Encontrado"],404);
        }

        return response()->json($jugador,200);

        // return new JugadorResource($jugador);
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
            return response()->json(["msg" => "Jugador No Encontrado","err" => true],404);
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

        return response()->json($jugador,202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jugador = Jugador::find($id);

        if (is_null($jugador)) {
            return response()->json(["msg" => "Jugador No Encontrado.","err" => true],404);
        }

        // si quiero eliminarlo de manera logica

        $jugador->estado = false;
        $jugador->save();

        // Si quiero eliminarlo de manera permanente fisca

        // $jugador->delete();

        return response()->json(['msg' => "Jugador Eliminado Correctamente.","err" => false],200);
    }
}
