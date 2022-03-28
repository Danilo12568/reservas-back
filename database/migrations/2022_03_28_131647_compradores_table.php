<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compradores', function (Blueprint $table) {
            $table->bigIncrements('id_comprador');
            $table->string('identificacion', 20)->required();
            $table->string('nombre', 255)->required();
            $table->string('correo', 255)->required();
            $table->string('telefono', 255)->required();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compradores');
    }
}
