<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;


class UsuarioController extends Controller
{

    public function Login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Credenciales Inválidas'], 401);
        }

        $usuario = User::where('email', $request->email)->first();

        $token = $usuario->createToken('auth_token')->plainTextToken;

        $res = DB::table('users')
        ->join('tipo_usuarios', 'users.id_tipousuario', '=', 'tipo_usuarios.id')
        ->select('users.*', 'tipo_usuarios.*')
        ->where('users.email', $usuario->email)
        ->get();

        return response()->json(
            [

                'accesToken' => $token,
                'tokenType' => 'Bearer',
                'typeUserId' => $usuario->id_tipousuario,
                'id' => $usuario->id,
                'userName' => $usuario->name,
                'email' => $usuario->email,
                'rol' => $res[0]->tipo,
                'status' => "ok",
                'message' => "Credenciales Válidas"
            ], 200

        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'id_tipousuario' => 'required'
        ]);

        $usuario = new User([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'password' => Hash::make($validData['password']),
            'id_tipousuario' => $validData['id_tipousuario'],
            'estado' => 1
        ]);

        $usuario->save();

        return response()->json($usuario,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
