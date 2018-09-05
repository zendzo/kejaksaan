<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ['Administrator','Kajati/Waka Jati','Ass. Bidang Intelijen','Ketua Tim Penyidik','Penyidik'];

        foreach ($role as $index) {
            Role::create([
                'name' => $index
            ]);
        }

        $this->command->info('User Roles Created !');
    }
}