<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate', function (Blueprint $table) {
            $table->string('tipo_id');
            $table->string('identidad')->unique();
            $table->string('foto');
            $table->string('nombre');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->date('fecha_nac');
            $table->string('email');
            $table->string('tel');
            $table->string('genero');
            $table->string('nacionalidad');
            $table->string('poblacion');
            $table->text('notas');
            $table->string('cv');
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
        Schema::dropIfExists('candidate');
    }
}
