<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre')->unique();
            $table->string('Matricula')->unique();
            $table->string('Nip')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('personals');
    }
}
