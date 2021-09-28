<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * $2y$10$q.Oe988EQSn/7g86hcT./eNjovKvzmWFEsR6U9Ok7I5e4t0MU6wuW
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>'$2y$10$q.Oe988EQSn/7g86hcT./eNjovKvzmWFEsR6U9Ok7I5e4t0MU6wuW',
            ],
        ];

        foreach($users as $user){
            User::create([
                'name'=>$user['name'],
                'email'=>$user['email'],
                'password'=>$user['password'],
            ]);
        }
    }

}
