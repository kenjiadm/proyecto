<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CartaNotarialDenuncia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('carta_notarial_denuncia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('denuncia_id')->unsigned();            
            $table->foreign('denuncia_id')->references('id')->on('denuncia');
            $table->string('name_carta_notarial');
            $table->string('fecha_envio_carta_notarial');
            $table->string('respuesta_carta_notarial');
            $table->string('fecha_respuesta_carta_notarial');
            $table->string('url');
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
