<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_masuk', function (Blueprint $table) {
            $table->bigIncrements('id_km');
            $table->date('tanggal');
            $table->unsignedbigInteger('user_id');
            $table->unsignedbigInteger('shift_id');
            $table->unsignedbigInteger('layanan_id');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('shift_id')->references('id_shift')->on('shift')->onDelete('cascade');
            $table->foreign('layanan_id')->references('id_layanan')->on('layanan')->onDelete('cascade');
            $table->integer('harga');
            $table->integer('total');
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
        Schema::dropIfExists('kas_masuk');
    }
}
