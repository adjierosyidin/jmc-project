<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('id_role')->default('2');
            $table->string('referrer')->default('admin');
            $table->string('id_parent')->nullable();
            $table->unsignedInteger('direct_downlines')->default(0);
            $table->string('avatar')->nullable();
            $table->string('activated')->default('no');
            $table->dateTime('activated_at')->nullable();
            $table->unsignedInteger('activated_by')->nullable();
            $table->rememberToken();
            $table->string('nik', 16);
            $table->string('telp');
            $table->text('alamat')->nullable();
            $table->string('kd_provinsi')->nullable();
            $table->string('kd_kabupaten')->nullable();
            $table->string('kd_kecamatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
