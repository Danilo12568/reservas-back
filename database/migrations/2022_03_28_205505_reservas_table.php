<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id_reserva');
            $table->unsignedBigInteger('id_evento');
            $table->foreign('id_evento')->references('id_evento')->on('eventos');
            $table->unsignedBigInteger('id_comprador');
            $table->foreign('id_comprador')->references('id_comprador')->on('compradores');
            $table->integer('nro_boletas')->required();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
