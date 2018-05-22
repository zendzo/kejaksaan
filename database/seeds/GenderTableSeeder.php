<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$genders = [
        	['gender'	=>	'Laki-Laki'],
        	['gender'	=>	'Perempuan']
        ];

        DB::table('genders')->insert($genders);

        $this->command->info("Successfully Add Status And Gender");
    }
}
