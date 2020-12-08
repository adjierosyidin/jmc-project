<?php

use App\MstBank;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = [
            [
                'kd_bank' => '014', 
                'nama_bank'  => 'Bank BCA',
                'created_at' => Carbon::now()
            ],
            [
                'kd_bank' => '008', 
                'nama_bank'  => 'Bank Mandiri',
                'created_at' => Carbon::now()
            ],
            [
                'kd_bank' => '009', 
                'nama_bank'  => 'Bank BNI',
                'created_at' => Carbon::now()
            ],
            [
                'kd_bank' => '002', 
                'nama_bank'  => 'Bank BRI',
                'created_at' => Carbon::now()
            ],
            [
                'kd_bank' => '022', 
                'nama_bank'  => 'Bank CIMB Niaga',
                'created_at' => Carbon::now()
            ],
            [
                'kd_bank' => '213', 
                'nama_bank'  => 'Bank BTPN',
                'created_at' => Carbon::now()
            ],
            [
                'kd_bank' => '200', 
                'nama_bank'  => 'Bank BTN',
                'created_at' => Carbon::now()
            ],
        ];
        MstBank::insert($bank);
    }
}
