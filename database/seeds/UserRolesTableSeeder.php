<?php

use App\UserRole;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => '1', 
                'nm_role'  => 'Admin',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '2', 
                'nm_role'  => 'User',
                'created_at' => Carbon::now()
            ],
        ];
        UserRole::insert($roles);
    }
}
