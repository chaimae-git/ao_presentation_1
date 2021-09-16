<?php

namespace Database\Seeders;

use App\Models\ministere_de_tuelle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MinistereDeTuelleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ministere_de_tuelles')->delete();


        $ministeres = array("Ministère de l'intérieur", "Ministere 2", "Ministere 3") ;
        
        foreach( $ministeres as  $ministere){
            ministere_de_tuelle::create(['ministere'=>$ministere]);
        }
    }
}
