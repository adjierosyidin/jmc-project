<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            UserRolesTableSeeder::class,
            UserTableSeeder::class,
            ProvinsiTableSeeder::class,
            KabupatenTableSeeder::class,
            KecamatanTableSeeder::class,
            UserTreeTableSeeder::class,
            BankTableSeeder::class,
            AccountActivationTableSeeder::class,
        ]);
    }
}
