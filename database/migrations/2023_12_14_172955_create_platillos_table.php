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
        Schema::create('platillos', function (Blueprint $table) {
              $table->bigIncrements('id');
    $table->string('nombre');
    $table->unsignedBigInteger('masa_id');
    $table->unsignedBigInteger('relleno_id');
    $table->integer('cantidad');
    $table->decimal('precio', 8, 2)->default(22.00);

    $table->timestamps();

    $table->foreign('masa_id')->references('id')->on('masas_inventarios');
    $table->foreign('relleno_id')->references('id')->on('rellenos_inventarios');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platillos');
    }
};
