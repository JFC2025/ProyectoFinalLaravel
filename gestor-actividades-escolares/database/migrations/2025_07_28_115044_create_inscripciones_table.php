<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreignId('actividad_id')->references('id')->on('actividades')->onDelete('cascade');
            $table->string('estado')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
};
