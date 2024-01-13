<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('masas_inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cantidad');//cantidad de porciones existente
            $table->string('entran');//porciones del pedido que llego
            $table->string('total');//suma de las porciones exixtentes y del nuevo pedido, ademas este es el numero de la porciones que se pueden ocupar para crear platillos
            $table->string('faltantes');//son las porciones que se ocuparon para crear los platillos
            $table->string('sobrantes');//total de porciones menos las porciones ocupadas
            $table->string('pedidos');//numero de porciones a pedir
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masas_inventarios');
    }
};
