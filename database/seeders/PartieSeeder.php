<?php

namespace Database\Seeders;

use App\Models\Partie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parties')->delete();

        $parties = [
            "partie administratif",
            "partie financiaire",
            "partie technique",
        ];

        foreach($parties as $partie){
            Partie::create(['partie'=>$partie]);
        }
    }
}
