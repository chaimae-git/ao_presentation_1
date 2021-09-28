<?php

namespace Database\Seeders;

use App\Models\Partenariat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartenariatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->delete();

        $partenariats = [
            "partenariat 1",
            "partenariat 2",
            "partenariat 3",
            "partenariat 4",
            "partenariat 5",
            "partenariat 6",
            "partenariat 7",
            "partenariat 8",
        ];

        foreach($partenariats as $partenariat){
            Partenariat::create(['partenariat'=>$partenariat]);
        }
    }
}
