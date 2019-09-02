<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_keluar', function (Blueprint $table) {
            $table->bigIncrements('id_kk');
            $table->unsignedbigInteger('user_id');
            $table->unsignedbigInteger('shift_id');
            $table->unsignedbigInteger('tagihan_id');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('shift_id')->references('id_shift')->on('shift')->onDelete('cascade');
            $table->foreign('tagihan_id')->references('id_tagihan')->on('tagihan')->onDelete('cascade');
            $table->integer('total');
            $table->text('keterangan');
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
        Schema::dropIfExists('kas_keluar');
    }
}
