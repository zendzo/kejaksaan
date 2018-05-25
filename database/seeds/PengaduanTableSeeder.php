<?php

use Illuminate\Database\Seeder;
use App\Pengaduan;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PengaduanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

    	foreach (range(1, 50) as $index) {
    		Pengaduan::create([
    			'no_ktp'			=> $faker->numberBetween($min = 1000000, $max = 9000000),
				'name'				=> "$faker->firstName $faker->lastName",
				'gender_id'			=> rand(1,2),
				'birth_date'		=> '12/09/1992',
				'phone'				=> $faker->phoneNumber,
				'email'				=> $faker->safeEmail,
				'address'			=> $faker->streetAddress,
				'title_pengaduan'	=> $faker->sentence($nbWords = 6, $variableNbWords = true),
				'content_pengaduan'	=> $faker->text($maxNbChars = 300),
				'status'			=> rand(1,3),
    		]);
    	}

    	$this->command->info('Data Pengaduan Created !');
    }
}
