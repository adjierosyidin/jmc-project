<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_kecamatan', function (Blueprint $table) {
            $table->string('kd_kecamatan')->primary();
            $table->string('kecamatan');

            $table->string('kd_kabupaten');
            $table->foreign('kd_kabupaten')->references('kd_kabupaten')->on('mst_kabupaten')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_kecamatan');
    }
}
