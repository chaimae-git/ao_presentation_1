<?php

namespace Database\Seeders;

use App\Models\Secteur_activite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecteurActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secteur_activites')->delete();

        $secteurs_activites = array("Infrastructures","BIM & Maquette numérique","Bâtiments");

        foreach($secteurs_activites as $secteur){
            Secteur_activite::create(['secteur'=>$secteur]);
        }
    }
}
