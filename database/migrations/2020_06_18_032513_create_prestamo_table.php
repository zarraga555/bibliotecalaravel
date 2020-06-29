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

            $table->foreignId('idLibro')->nullable()->constrained('libro')->onDelete('set null');
            $table->foreignId('idPersona')->nullable()->constrained('persona')->onDelete('set null');
            $table->foreignId('idUsuario')->nullable()->constrained('users')->onDelete('set null');
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
