<?php

use Illuminate\Database\Seeder;

class RegimentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regiment_data')->insert([
            'userId' => 78352635,
            'attribute_data' => json_encode([
'Constitution' => 7,
'Dexterity' => 6,
'Intelligence' => 5,
'Strength' => 7
            	])
        ]);
    }
}
