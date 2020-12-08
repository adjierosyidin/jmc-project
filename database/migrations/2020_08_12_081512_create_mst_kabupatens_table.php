<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstKabupatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('mst_kabupaten', function (Blueprint $table) {
            $table->string('kd_kabupaten')->primary();
            $table->string('kabupaten');
            $table->string('kd_provinsi');

            $table->foreign('kd_provinsi')->references('kd_provinsi')->on('mst_provinsi')->onDelete('cascade');
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
        Schema::dropIfExists('mst_kabupaten');
    }
}
