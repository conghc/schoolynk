<?php

use Illuminate\Database\Seeder;

class DegreesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('degrees')->insert([
            ['name' => 'All'],
            ['name' => 'High school year1'],
            ['name' => 'High school year2'],
            ['name' => 'High school year3'],
            ['name' => 'University (Bachelor) Year1'],
            ['name' => 'University (Bachelor) Year2'],
            ['name' => 'University (Bachelor) Year3'],
            ['name' => 'University (Bachelor) Year4'],
            ['name' => 'University (Master) Year1'],
            ['name' => 'University (Master) Year2'],
            ['name' => 'Adult learner (Working)'],
        ]);
    }
}
