<?php

use Illuminate\Database\Seeder;
use App\MstProvinsi;
use Carbon\Carbon;

class ProvinsiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $provinsis = [
            ['kd_provinsi' => '11','provinsi' =>'ACEH','created_at'=> Carbon::now()],
            ['kd_provinsi' => '12','provinsi' =>'SUMATERA UTARA','created_at'=> Carbon::now()],
            ['kd_provinsi' => '13','provinsi' =>'SUMATERA BARAT','created_at'=> Carbon::now()],
            ['kd_provinsi' => '14','provinsi' =>'RIAU','created_at'=> Carbon::now()],
            ['kd_provinsi' => '15','provinsi' =>'JAMBI','created_at'=> Carbon::now()],
            ['kd_provinsi' => '16','provinsi' =>'SUMATERA SELATAN','created_at'=> Carbon::now()],
            ['kd_provinsi' => '17','provinsi' =>'BENGKULU','created_at'=> Carbon::now()],
            ['kd_provinsi' => '18','provinsi' =>'LAMPUNG','created_at'=> Carbon::now()],
            ['kd_provinsi' => '19','provinsi' =>'KEPULAUAN BANGKA BELITUNG','created_at'=> Carbon::now()],
            ['kd_provinsi' => '21','provinsi' =>'KEPULAUAN RIAU','created_at'=> Carbon::now()],
            ['kd_provinsi' => '31','provinsi' =>'DKI JAKARTA','created_at'=> Carbon::now()],
            ['kd_provinsi' => '32','provinsi' =>'JAWA BARAT','created_at'=> Carbon::now()],
            ['kd_provinsi' => '33','provinsi' =>'JAWA TENGAH','created_at'=> Carbon::now()],
            ['kd_provinsi' => '34','provinsi' =>'D I YOGYAKARTA','created_at'=> Carbon::now()],
            ['kd_provinsi' => '35','provinsi' =>'JAWA TIMUR','created_at'=> Carbon::now()],
            ['kd_provinsi' => '36','provinsi' =>'BANTEN','created_at'=> Carbon::now()],
            ['kd_provinsi' => '51','provinsi' =>'BALI','created_at'=> Carbon::now()],
            ['kd_provinsi' => '52','provinsi' =>'NUSA TENGGARA BARAT','created_at'=> Carbon::now()],
            ['kd_provinsi' => '53','provinsi' =>'NUSA TENGGARA TIMUR','created_at'=> Carbon::now()],
            ['kd_provinsi' => '61','provinsi' =>'KALIMANTAN BARAT','created_at'=> Carbon::now()],
            ['kd_provinsi' => '62','provinsi' =>'KALIMANTAN TENGAH','created_at'=> Carbon::now()],
            ['kd_provinsi' => '63','provinsi' =>'KALIMANTAN SELATAN','created_at'=> Carbon::now()],
            ['kd_provinsi' => '64','provinsi' =>'KALIMANTAN TIMUR','created_at'=> Carbon::now()],
            ['kd_provinsi' => '71','provinsi' =>'SULAWESI UTARA','created_at'=> Carbon::now()],
            ['kd_provinsi' => '72','provinsi' =>'SULAWESI TENGAH','created_at'=> Carbon::now()],
            ['kd_provinsi' => '73','provinsi' =>'SULAWESI SELATAN','created_at'=> Carbon::now()],
            ['kd_provinsi' => '74','provinsi' =>'SULAWESI TENGGARA','created_at'=> Carbon::now()],
            ['kd_provinsi' => '75','provinsi' =>'GORONTALO','created_at'=> Carbon::now()],
            ['kd_provinsi' => '76','provinsi' =>'SULAWESI BARAT','created_at'=> Carbon::now()],
            ['kd_provinsi' => '81','provinsi' =>'MALUKU','created_at'=> Carbon::now()],
            ['kd_provinsi' => '82','provinsi' =>'MALUKU UTARA','created_at'=> Carbon::now()],
            ['kd_provinsi' => '91','provinsi' =>'PAPUA BARAT','created_at'=> Carbon::now()],
            ['kd_provinsi' => '94','provinsi' =>'PAPUA','created_at'=> Carbon::now()],
        ];
        MstProvinsi::insert($provinsis);
    }
}
