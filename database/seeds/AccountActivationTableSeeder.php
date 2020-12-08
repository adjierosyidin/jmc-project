<?php

use App\AccountActivation;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AccountActivationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'biaya_join' => '2500000', 
                'nama_bank'  => 'Bank BCA',
                'no_rek'     => '7790254991',
                'nama_pemilik'  => 'Adjie Rosyidin',
                'no_wa' => '082234897208',
                'created_at' => Carbon::now()
            ],
        ];
        AccountActivation::insert($data);
    }
}
