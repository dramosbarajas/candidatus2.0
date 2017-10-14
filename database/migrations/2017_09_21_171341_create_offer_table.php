<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado');
            $table->date('fecha');
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('departamento');
            $table->string('estudios');
            $table->string('experiencia');
            $table->string('contrato');
            $table->integer('duracion')->length('2');
            $table->string('jornada');
            $table->string('bandamin');
            $table->string('bandamax');
            $table->integer('vacante')->length('2');
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
        Schema::dropIfExists('offers');
    }
}
