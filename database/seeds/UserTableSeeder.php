<?php

use Illuminate\Database\Seeder;

use App\User;

use Carbon\Carbon;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        foreach (range(0,10) as $index) {
            User::create([
                'first_name'    =>  $faker->firstName,
                'last_name'     =>  $faker->lastName,
                'gender_id'     =>  rand(1,2),
                'birth_date'    =>  $faker->dateTimeThisCentury->format('d/m/Y'),
                'email'         =>  $faker->safeEmail,
                'phone'         =>  env('CUSTOMER_TEST_PHONENUMBER'),
                'password'      =>  'adminadmin',
                'role_id'       =>  rand(1,4),
                'active'        =>  rand(0,1),
            ]);
        }

        $this->command->info('User Fake Data Created !');

    }
}
