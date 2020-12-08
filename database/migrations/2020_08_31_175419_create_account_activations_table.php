<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_activations', function (Blueprint $table) {
            $table->id();
            $table->string('biaya_join');
            $table->string('nama_bank');
            $table->string('no_rek');
            $table->string('nama_pemilik');
            $table->string('no_wa');
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
        Schema::dropIfExists('account_activations');
    }
}
