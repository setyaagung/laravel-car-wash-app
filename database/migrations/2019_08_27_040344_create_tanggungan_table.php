<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanggunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggungan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('karyawan_id');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->enum('status', ['Lunas', 'Belum Lunas']);
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
        Schema::dropIfExists('tanggungan');
    }
}
