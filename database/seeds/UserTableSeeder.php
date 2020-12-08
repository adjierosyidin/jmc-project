<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Adjie Rosyidin',
                'username'       => 'adjie48',
                'email'          => 'adjierosyidin48@gmail.com',
                'password'       => bcrypt('12345678'),
                'id_role'        => '1',
                'id_parent'      => '0',
                'direct_downlines'  => '0',
                'activated'      => 'yes',
                'remember_token' => null,
                'nik'            => '1232456789987452',
                'telp'           => '082345566745',
                'alamat'         => 'Jl.ASWD',
                'kd_provinsi'       => '33',
                'kd_kabupaten'      => '3313',
                'kd_kecamatan'      => '3313120',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            /* [
                'id'             => 2,
                'name'           => 'Adjie Rosyidin',
                'username'       => 'adjie48',
                'email'          => 'adjie@adjie.com',
                'password'       => bcrypt('12345678'),
                'id_role'        => '2',
                'id_parent'      => '1',
                'direct_downlines'  => '0',
                'activated'      => 'yes',
                'remember_token' => null,
                'nik'            => '3232323434354255',
                'telp'           => '+6282345766745',
                'alamat'         => 'Jl.ASWD',
                'kd_provinsi'       => '33',
                'kd_kabupaten'      => '3313',
                'kd_kecamatan'      => '3313120',
                'created_at' => Carbon::now('Asia/Jakarta')
            ], */
        ];

        User::insert($users);
    }
}
