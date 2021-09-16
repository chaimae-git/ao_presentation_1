<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aos', function (Blueprint $table) {
            $table->id();

            /**section_1**/
            $table->string('num_AO')->unique();
            $table->date('date_limite');
            $table->foreignId('pays_id')->constrained('pays');
            $table->foreignId('type_id')->constrained('types');
            $table->date('date_adjudication')->nullable();
            $table->foreignId('ministere_id')->constrained('ministere_de_tuelles');
            $table->foreignId('secteur_id')->constrained('secteur_activites');
            $table->string('partenariat');
            $table->float('montant_soumission', 10,2)->unsigned()->nullable();
            $table->float('budget', 10,2)->unsigned()->nullable();
            $table->integer('n_lot')->unsigned();
            $table->foreignId('client_id')->constrained('clients');
            $table->float('montant_c_p', 10,2)->unsigned()->nullable();
            $table->foreignId('critere_selection_id')->constrained('critere_selections');
            $table->text('objet');
            $table->string('RC');
            $table->string('CPS');


            /**section_3**/
            $table->string('geom');
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
        Schema::dropIfExists('aos');
    }
}
