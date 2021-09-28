<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAoPartenariatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ao_partenariat', function (Blueprint $table) {
            $table->foreignId('appel_offre_id')->constrained('aos');
            $table->foreignId('partenariat_id')->constrained('partenariats');
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
        Schema::dropIfExists('ao_partenariat');
    }
}
