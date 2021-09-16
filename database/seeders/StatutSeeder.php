<?php

namespace Database\Seeders;

use App\Models\Statut;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuts')->delete();

        $statuts = [
            [
                'id'=>1,
                'statut'=>'Statut 1'
            ],
            [
                'id'=>2,
                'statut'=>'Statut 2'
            ],
            [
                'id'=>3,
                'statut'=>"Statut 3"
            ],
            [
                'id'=>4,
                'statut'=>'secretaire'
            ]
        ];

        foreach($statuts as $statut){
            Statut::create([
                'id'=>$statut['id'],
                'statut'=>$statut['statut'],
            ]);
        }
    }
}
