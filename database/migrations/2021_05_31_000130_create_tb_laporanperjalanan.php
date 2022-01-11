<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLaporanperjalanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_laporanperjalanan', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('kilometer')->nullable();
            $table->unsignedBigInteger('konsumsi')->nullable();
            $table->string('ban',255)->nullable();
            $table->string('kondisi',255)->nullable();
            $table->unsignedBigInteger('id_laporan');
            $table->unsignedBigInteger('id_rute');
            $table->timestamps();

            $table->foreign('id_laporan')->references('id')->on('tb_laporan');
            $table->foreign('id_rute')->references('id')->on('tb_rute');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_laporanperjalanan');
    }
}
