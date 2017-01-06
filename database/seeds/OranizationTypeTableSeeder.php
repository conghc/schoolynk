<?php

use Illuminate\Database\Seeder;

class OranizationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oranization_types')->insert([
            ['name' => 'Government(national level)'],
            ['name' => 'Government(province level)'],
            ['name' => 'Foundations'],
            ['name' => 'Banks'],
            ['name' => 'Companies'],
            ['name' => 'Individuals'],
        ]);
    }
}
