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
        Schema::create('candidates', function (Blueprint $table) {
            $table->string('tipo_id');
            $table->string('identidad')->unique();
            $table->date('fecha_nac');
            $table->string('genero');
            $table->string('nombre');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('email');
            $table->string('tel');
            $table->string('nacionalidad');
            $table->string('provincia');
            $table->string('poblacion');
            $table->text('notas')->nullable();
            $table->string('cv')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
