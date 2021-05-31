<?php

namespace Database\Seeders;

use App\Models\Cost;
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
        // \App\Models\VariableCosts::factory(15)->create();

        \App\Models\Project::factory(4)->has(Cost::factory()->count(10))->create();


    }
}
