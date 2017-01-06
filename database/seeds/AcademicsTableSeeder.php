<?php

use Illuminate\Database\Seeder;

class AcademicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academics')->insert([
            ['name' => 'High school'],
            ['name' => 'Bachelor program'],
            ['name' => 'Master program'],
            ['name' => 'Ph.D program'],
        ]);
    }
}
