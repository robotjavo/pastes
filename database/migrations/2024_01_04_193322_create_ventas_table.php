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
        Schema::create('ventas', function (Blueprint $table) {
              $table->bigIncrements('id');
            $table->unsignedBigInteger('platillos_id');
            $table->unsignedBigInteger('bebidas_inventarios_id');
            $table->unsignedBigInteger('productos_inventarios_id');
            $table->string('venta');
            $table->string('factura');
            $table->integer('importe');
            $table->string('cambio');
            $table->timestamps();

            $table->foreign('platillos_id')->references('id')->on('platillos');
            $table->foreign('bebidas_inventarios_id')->references('id')->on('bebidas_inventarios');
            $table->foreign('productos_inventarios_id')->references('id')->on('productos_inventarios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
