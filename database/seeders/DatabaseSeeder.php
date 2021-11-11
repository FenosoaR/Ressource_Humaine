<?php

namespace Database\Seeders;

use App\Models\Personnel;
use App\Models\Salaire;
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
        Personnel::factory(15)->create();
       
    }
    
}
