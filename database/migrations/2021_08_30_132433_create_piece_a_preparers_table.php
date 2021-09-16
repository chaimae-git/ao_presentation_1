<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceAPreparersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_a_preparers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partie_id')->constrained('parties');
            $table->foreignId('ao_id')->constrained('aos');
            $table->string('nom_fichier');
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
        Schema::dropIfExists('piece_a_preparers');
    }
}
