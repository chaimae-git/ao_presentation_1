<?php

namespace Database\Seeders;

use App\Models\Adjudication;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdjudicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adjudications')->delete();

        $adjudications = [
            [
                'id'=>1,
                'adjudication'=>'En Cours'
            ],
            [
                'id'=>2,
                'adjudication'=>'Retenu'
            ],
            [
                'id'=>3,
                'adjudication'=>"Non Retenu"
            ],
            [
                'id'=>4,
                'adjudication'=>'Infrectueux'
            ],
            [
                'id'=>5,
                'adjudication'=>'Annulé'
            ]
        ];

        foreach($adjudications as $adjudication){
            Adjudication::create([
                'id'=>$adjudication['id'],
                'adjudication'=>$adjudication['adjudication'],
            ]);
        }
    }
}
