<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiemposTable extends Migration
{
    public function up()
    {
        Schema::create('tiempos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personal_id'); // Llave foránea a la tabla personals
            $table->dateTime('entrada');
            $table->dateTime('salida')->nullable();
            $table->timestamps();

            // Definir la restricción de la llave foránea
            $table->foreign('personal_id')->references('id')->on('personals');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tiempos');
    }
}
