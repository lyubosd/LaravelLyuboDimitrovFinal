<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->String('Nombre');
            $table->String('Director');
            $table->String('Genero');
            $table->date('Lanzamiento');
            $table->integer('Duracion');
            $table->integer('EdadMinima');
            $table->String('Sinopsis');
            $table->decimal('Valoracion');
            $table->String('Foto');
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
        Schema::dropIfExists('peliculas');
    }
}
