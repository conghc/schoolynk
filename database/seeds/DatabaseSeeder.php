<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AcademicsTableSeeder::class);
        $this->call(DegreesTableSeeder::class);
        $this->call(MajorsTableSeeder::class);
        $this->call(OranizationTypeTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(TypeOfStudyTableSeeder::class);
    }
}
