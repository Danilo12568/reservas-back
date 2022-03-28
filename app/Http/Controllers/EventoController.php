<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Evento;

class EventoController extends Controller
{
    public function guardarEvento(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required',
            'lugar' => 'required',
            'fecha' => 'required',
            'cantidad_boletas' => 'required',
        ], [
            'descripcion.required' => '*Rellena este campo',
            'lugar.required' => '*Rellena este campo',
            'fecha.required' => '*Rellena este campo',
            'cantidad_boletas.required' => '*Rellena este campo',
        ]);

        $new_evento = new Evento();
        $new_evento->descripcion = $request->descripcion;
        $new_evento->lugar = $request->lugar;
        $new_evento->fecha = $request->fecha;
        $new_evento->cantidad_boletas = $request->cantidad_boletas;
        $new_evento->boletas_disponibles = $request->cantidad_boletas;
        $response = $new_evento->save();

        return response()->json(["response" => $response], 200 );
    }

    public function traerEventos ()
    {
        $eventos = Evento::get();
        return response()->json($eventos);
    }
}
