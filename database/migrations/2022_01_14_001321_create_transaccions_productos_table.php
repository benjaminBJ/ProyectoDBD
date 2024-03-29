<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionsProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccions_productos', function (Blueprint $table) {
            $table->id();
            //foranea
            $table->unsignedBigInteger('id_transaccions')->nullable();
            $table->foreign('id_transaccions')->references('id')->on('transaccions');
            //foranea
            $table->unsignedBigInteger('id_productos')->nullable();
            $table->foreign('id_productos')->references('id')->on('productos');
            $table->boolean('delete');

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
        Schema::dropIfExists('transaccions_productos');
    }
}
