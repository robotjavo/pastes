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
        Schema::create('bebidas_inventarios', function (Blueprint $table) {
            $table->bigIncrements('id');
           // $table->unsignedBigInteger('bebidas_id'); //nombre de la bebidas de la llave forania
            $table->string('nombre');
            $table->string('cantidad');//cantidad de bebidas existente
            $table->string('entran');//bidas del pedido que llego
            $table->string('total');//suma de las bebidas exixtentes y del nuevo pedido
            $table->string('vendidas');//bebidas vendidas
            $table->string('sobrantes');//total de la bebidas menos la resta de las bebidas vendidas
            $table->string('pedidos');//numero del bebidas a pedir
            $table->unsignedBigInteger('personal_id');
            $table->decimal('precio', 8, 2)->default(22.00); // Nueva columna precio con valor por defecto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bebidas_inventarios');
    }
};
