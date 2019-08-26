<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanggunganKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggungan_karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('karyawan_id');
            $table->string('tanggungan');
            $table->integer('jumlah');
            $table->enum('status', ['Lunas', 'Belum Lunas']);
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
        Schema::dropIfExists('tanggungan_karyawan');
    }
}
