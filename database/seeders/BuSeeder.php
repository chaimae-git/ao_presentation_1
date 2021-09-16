<?php

namespace Database\Seeders;

use App\Models\Bu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bus')->delete();

        $bus = [
            [
                'nom'=>'bu xyz',
                'description'=>'description 1'
            ],
            [
                'nom'=>'bu zzz',
                'description'=>'description 2'
            ],
            [
                'nom'=>'bu byz',
                'description'=>'description 1'
            ],
            [
                'nom'=>'bu abc',
                'description'=>'description 1'
            ]
        ];

        foreach($bus as $bu){
            Bu::create([
                'nom'=>$bu['nom'],
                'description'=>$bu['description']
            ]);
        }
    }
}
