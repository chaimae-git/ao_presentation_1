<?php

namespace Database\Seeders;

use App\Models\Critere_selection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CritereSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('critere_selections')->delete();

        $criteres = [
            'Moins disant',
            'Mieux disant'
        ];

        foreach($criteres as $critere){
            Critere_selection::create(['critere'=>$critere]);
        }
    }
}
