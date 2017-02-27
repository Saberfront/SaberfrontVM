<?php

use Illuminate\Database\Seeder;

class SecondaryInventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
 		DB::table('secondary_inventories')->insert([
 		            'userId' => 78352635,
            'tank_ammo' => json_encode([
                   'particle' => 20,
                   'laser' => 40,
                   'heat_missile' => 50,
                   'smoke_missile' => 25 
            	])
        ]);    }

}
