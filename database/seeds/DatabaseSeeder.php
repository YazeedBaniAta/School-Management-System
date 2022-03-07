<?php

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
         $this->call(TypeBloodSeeder::class);
         $this->call(NationalitiesTableSeeder::class);
         $this->call(religionTableSeeder::class);
         $this->call(SpecializationsTableSeeder::class);
         $this->call(GenderTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
