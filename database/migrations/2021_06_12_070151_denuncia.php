<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Denuncia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('denuncia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('denunciante_id')->unsigned();            
            $table->foreign('denunciante_id')->references('id')->on('denunciante');
            $table->string('tipo');
            $table->string('fecha_denuncia');
            $table->string('name_denunciado');
            $table->integer('detalle_denuncia_id')->unsigned();            
            $table->foreign('detalle_denuncia_id')->references('id')->on('detalle_denuncia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
