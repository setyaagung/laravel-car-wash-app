<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Absensi', function (Blueprint $table) {
            $table->bigIncrements('id_absensi');
            $table->integer('karyawan_id');
            $table->enum('jenis',['Sakit', 'Izin', 'Alfa']);
            $table->text('keterangan');
            $table->integer('denda');
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
        Schema::dropIfExists('Absensi');
    }
}
