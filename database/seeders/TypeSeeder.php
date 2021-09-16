<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();

        $types = array("type 1","type 2","type 3", "type 4");

        foreach($types as $type){
            Type::create(['type'=>$type]);
        }
    }
}
