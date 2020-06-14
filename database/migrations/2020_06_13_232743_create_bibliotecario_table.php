<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibliotecarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliotecario', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->bigInteger('ci')->unique();
            $table->string('complemento', 5)->nullable();
            $table->string('nombre', 300);
            $table->string('direccion');
            $table->bigInteger('telefono');
            $table->string('correo');
            $table->string('turno');
            $table->double('salario');
            $table->date('fechaNacimiento');
            $table->string('paisNacimiento');
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
        Schema::dropIfExists('bibliotecario');
    }
}
