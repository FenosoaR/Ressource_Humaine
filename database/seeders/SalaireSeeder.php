<?php

namespace Database\Seeders;

use App\Models\Salaire;
use Illuminate\Database\Seeder;

class SalaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salaire::factory(10)->create();
    }
}
