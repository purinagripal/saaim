<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->unique();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->boolean('protecc_datos');
            $table->integer('num_expediente')->unique();
            $table->date('fecha_registro');
            $table->string('nombre', 45);
            $table->string('apellidos');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('doc_identif', 25)->nullable();
            $table->string('domicilio')->nullable();
            $table->string('codigo_postal',12)->nullable();
            $table->string('poblacion', 45)->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('email', 50)->nullable();

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
        Schema::dropIfExists('expedientes');
    }
}
