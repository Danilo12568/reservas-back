<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comprador;


class CompradorController extends Controller
{
    public function guardarComprador(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identificacion' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
        ], [
            'identificacion.required' => '*Rellena este campo',
            'nombre.required' => '*Rellena este campo',
            'correo.required' => '*Rellena este campo',
            'telefono.required' => '*Rellena este campo',
        ]);

        $new_comprador = new Comprador();
        $new_comprador->identificacion = $request->identificacion;
        $new_comprador->nombre = $request->nombre;
        $new_comprador->correo = $request->correo;
        $new_comprador->telefono = $request->telefono;
        $response = $new_comprador->save();

        return response()->json(["response" => $response], 200  );
    }

    public function traerCompradores ()
    {
        $compradores = Comprador::get();
        return response()->json($compradores);
    }
}
