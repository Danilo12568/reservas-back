<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompradorController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ReservaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * Rutas del componente de comprador
 */
Route::group([
    'prefix' => 'comprador',
], function ($router) {
    Route::post('/guardar-comprador', [CompradorController::class, 'guardarComprador']);
    Route::get('/traer-compradores', [CompradorController::class, 'traerCompradores']);

    Route::get('/listar-grupos/{id}', [CompradorController::class, 'listarGrupos']);
    Route::put('/editar-grupo/{id_grupo}', [CompradorController::class, 'editarGrupo']);
    Route::put('/cambiar-estado', [CompradorController::class, 'cambiarEstado']);
    Route::get('/traer-grupo/{id_grupo}', [CompradorController::class, 'traerGrupo']);
    Route::delete('/eliminar-grupo/{id_grupo}', [CompradorController::class, 'eliminarGrupo']);
});

/**
 * Rutas del componente de evento
 */
Route::group([
    'prefix' => 'evento',
], function ($router) {
    Route::post('/guardar-evento', [EventoController::class, 'guardarEvento']);
    Route::get('/traer-eventos', [EventoController::class, 'traerEventos']);
});

/**
 * Rutas del componente de reserva
 */
Route::group([
    'prefix' => 'reserva',
], function ($router) {
    Route::post('/guardar-reserva', [ReservaController::class, 'guardarReserva']);
});
