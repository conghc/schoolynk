<?php

use Illuminate\Database\Seeder;

class TypeOfStudyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_studies')->insert([
            ['name' => 'Exchange program'],
            ['name' => 'Full degree'],
            ['name' => 'Working holiday'],
            ['name' => 'Language studies'],
            ['name' => 'High school program'],
        ]);
    }
}
