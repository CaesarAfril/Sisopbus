<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLaporanperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_laporanperawatan', function (Blueprint $table) {
            $table->id('id');
            $table->string('bagian',255)->nullable();
            $table->string('jenis',255)->nullable();
            $table->date('tanggal')->nullable();
            $table->string('keterangan',255)->nullable();
            $table->unsignedBigInteger('id_laporan');
            $table->timestamps();

            $table->foreign('id_laporan')->references('id')->on('tb_laporan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_laporanperawatan');
    }
}
