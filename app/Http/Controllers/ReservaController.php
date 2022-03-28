<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Reserva;
use App\Models\Evento;
use Illuminate\Support\Facades\Date;

class ReservaController extends Controller
{
    public function guardarReserva(Request $request)
    {
        $evento = Evento::find($request['evento']['id_evento']);

        if($evento && $request['evento']['boletas_disponibles'] <= 0) {
            return response()->json(["error" => 'No hay boletas disponibles'], 500);
        }
        
        $evento->boletas_disponibles = $evento->boletas_disponibles - 1;
        $response = $evento->save();

        $new_reserva = new Reserva();
        $new_reserva->id_evento = $evento->id_evento;
        $new_reserva->id_comprador = $request['comprador']['id_comprador'];
        $response = $new_reserva->save();

        return response()->json(["response" => $response], 200 );
    }
}
