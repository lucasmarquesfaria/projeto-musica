<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConexaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conexoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario1');
            $table->unsignedBigInteger('id_usuario2');
            $table->date('data_conexao');
            $table->timestamps();

            //foreing key (constraints)
            $table->foreign('id_usuario1')->references('id')->on('usuarios');
            $table->foreign('id_usuario2')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conexoes');
    }
}
