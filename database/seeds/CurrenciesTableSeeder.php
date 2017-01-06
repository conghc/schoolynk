<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            ['sort_name' => 'USD',
             'full_name' => 'Amercica Dollar'],
             ['sort_name' => 'GBP',
             'full_name' => 'British pound'],
             ['sort_name' => 'AUD',
             'full_name' => 'Australian dollar '],
             ['sort_name' => 'NZD',
             'full_name' => 'New Zealand Dollar'],
             ['sort_name' => 'CAD',
             'full_name' => 'Canadian dollar'],
             ['sort_name' => 'JPY',
             'full_name' => 'Japanese yen'],
             ['sort_name' => 'CNY',
             'full_name' => 'Chinese yuan'],
             ['sort_name' => 'Euro',
             'full_name' => 'Euro'],
             ['sort_name' => 'SGD',
             'full_name' => 'Singaporean dollar'],
             ['sort_name' => 'VND',
             'full_name' => 'Vietnamese dong']
        ]);
    }
}
