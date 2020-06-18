<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->id();
            $table->integer('codigoLibro');
            $table->string('nombre', 100);
            $table->integer('paginas');
            $table->date('fecha_lanzamiento');
            
            $table->foreignId('idEditorial')->constrained('editorial');
            $table->foreignId('idAutor')->constrained('autor');
            $table->foreignId('idCategoriaLibro')->constrained('categorialibro');
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
        Schema::dropIfExists('libro');
    }
}
