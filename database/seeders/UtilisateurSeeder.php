<?php

namespace Database\Seeders;

use App\Models\Utilisateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /**

    $table->string('nom_prenom');
    $table->string('image')->nullable();
    $table->string('username');
    $table->string('email');
    $table->string('password');
    $table->foreignId('statut_id')
     */
    public function run()
    {
        DB::table('utilisateurs')->delete();

        $utilisateurs = [
            [
                'nom_prenom'=>'ahmed ahmed',
                'image'=>'image',
                'username'=>'ahmed_ahmed',
                'email'=>'ahmed@gmail.com',
                'password'=>'123456',
                'statut_id'=>4
            ],
            [
                'nom_prenom'=>'chaimae amrani',
                'image'=>'image',
                'username'=>'chaimae_amrani',
                'email'=>'chaimae@gmail.com',
                'password'=>'123456',
                'statut_id'=>1
            ],
            [
                'nom_prenom'=>'adil amzabi',
                'image'=>'image',
                'username'=>'adil_amzabi',
                'email'=>'adil@gmail.com',
                'password'=>'123456',
                'statut_id'=>4
            ],
            [
                'nom_prenom'=>'mouhamed ali',
                'image'=>'image',
                'username'=>'mouhamed_ali',
                'email'=>'mouhamed_ali@gmail.com',
                'password'=>'123456',
                'statut_id'=>3
            ],
            [
                'nom_prenom'=>'samir moutawakil',
                'image'=>'image',
                'username'=>'samir_moutawakil',
                'email'=>'samir@gmail.com',
                'password'=>'123456',
                'statut_id'=>4
            ],
            [
                'nom_prenom'=>'naima ahmadi',
                'image'=>'image',
                'username'=>'naima_ahmadi',
                'email'=>'naima@gmail.com',
                'password'=>'123456',
                'statut_id'=>4
            ],
        ];

        foreach($utilisateurs as $utilisateur){
            Utilisateur::create([
                'nom_prenom'=>$utilisateur['nom_prenom'],
                'image'=>$utilisateur['image'],
                'username'=>$utilisateur['username'],
                'email'=>$utilisateur['email'],
                'password'=>$utilisateur['password'],
                'statut_id'=>$utilisateur['statut_id']
            ]);
        }
    }
}
