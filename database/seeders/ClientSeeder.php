<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->delete();

        $clients = [
            "client 1",
            "client 2",
            "client 3",
            "client 4"
        ];

        foreach($clients as $client){
            Client::create(['client'=>$client]);
        }
    }
}
