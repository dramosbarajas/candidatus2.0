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
            $table->string('titulo', 30);
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('puesto');
            $table->string('contrato');
            $table->integer('duracion')->length('3');
            $table->string('formacion');
            $table->string('experiencia');
            $table->integer('rango_sal_min')->unsigned()->length('5');
            $table->integer('rango_sal_max')->unsigned()->length('5');
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
