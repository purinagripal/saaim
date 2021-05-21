<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('anotaciones')->nullable();
            $table->boolean('beneficiario_directo');

            $table->unsignedBigInteger('sexo_id')->nullable();
            $table->foreign('sexo_id')->references('id')->on('sexos')->onDelete('set null');

            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('set null');

            $table->unsignedBigInteger('paisnacionalidad_id')->nullable();
            $table->foreign('paisnacionalidad_id')->references('id')->on('paises')->onDelete('set null');

            $table->unsignedBigInteger('paisorigen_id')->nullable();
            $table->foreign('paisorigen_id')->references('id')->on('paises')->onDelete('set null');

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
        Schema::dropIfExists('usuarios');
    }
}
