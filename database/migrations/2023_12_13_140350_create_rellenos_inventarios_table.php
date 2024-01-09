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
        Schema::create('rellenos_inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cantidad');//cantidad de porciones existentes
            $table->string('entran');//catidad de porciones del pedido anterio
            $table->string('total');//suma de las porciones exixtentes y del nuevo pedido, ademas este es el numero de la porciones que se pueden ocupar para crear platillos
            $table->string('sobrantes');
            $table->string('faltantes');//son las porciones que se ocuparon para crear los platillos
            $table->string('pedidos');//total de la bebidas menos las
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rellenos_inventarios');
    }
};
