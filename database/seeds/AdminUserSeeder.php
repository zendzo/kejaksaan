<?php

use Illuminate\Database\Seeder;

use App\User;

use Carbon\Carbon;
use Faker\Factory;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        for ($i=0; $i < 1; $i++) { 
        	$user->first_name = 'Administrator';
	        $user->last_name = 'System';
            $user->email = 'admin@kejaksaan.com';
            $user->gender_id = 1;
            $user->birth_date = '12/09/1992';
	        $user->phone = env('CUSTOMER_TEST_PHONENUMBER');
	        $user->password = 'adminadmin';
            $user->role_id = 1;
            $user->active = true;
	        $user->save();
        }

        $this->command->info('Administrator User Created !');

    }
}
