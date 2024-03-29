<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosFeriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos_ferias', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            //Foraneas
            $table->unsignedBigInteger('id_usuarios')->nullable();
            $table->foreign('id_usuarios')->references('id')->on('usuarios');
            $table->unsignedBigInteger('id_ferias')->nullable();
            $table->foreign('id_ferias')->references('id')->on('ferias');
            $table->timestamps();
            $table->boolean('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puestos_ferias');
    }
}
