<?php

namespace Database\Seeders;

use App\Models\ministere_de_tuelle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PaysSeeder::class);
        $this->call(SecteurActiviteSeeder::class);
        $this->call(MinistereDeTuelleSeeder::class);
        $this->call(StatutSeeder::class);
        $this->call(BuSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(StatutSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(UtilisateurSeeder::class);
        $this->call(CritereSelectionSeeder::class);
    }
}
