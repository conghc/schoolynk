<?php

use Illuminate\Database\Seeder;

class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            ['name' => 'History'],
            ['name' => 'Linguistics'],
            ['name' => 'Literature'],
            ['name' => 'Performing arts'],
            ['name' => 'Philosophy'],
            ['name' => 'Religion'],
            ['name' => 'Visual arts'],
            ['name' => 'Anthropology'],
            ['name' => 'Archaeology'],
            ['name' => 'Area studies'],
            ['name' => 'Economics'],
            ['name' => 'Geography'],
            ['name' => 'Psychology'],
            ['name' => 'Biology'],
            ['name' => 'Chemistry'],
            ['name' => 'Physics'],
            ['name' => 'Mathematics']
        ]);
    }
}
