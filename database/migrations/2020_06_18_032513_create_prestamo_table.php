<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo', function (Blueprint $table) {
            $table->id();
            $table->string('tipoPrestamo', 100);
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');

            $table->foreignId('idLibro')->constrained('libro');
            $table->foreignId('idPersona')->constrained('persona');
            $table->foreignId('idUsuario')->constrained('users');
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
        Schema::dropIfExists('prestamo');
    }
}
