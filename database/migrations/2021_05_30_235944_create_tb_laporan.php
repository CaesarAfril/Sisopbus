<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_laporan', function (Blueprint $table) {
            $table->id('id');
            $table->date('tanggal');
            $table->string('operasional',255);
            $table->string('status',255);
            $table->unsignedBigInteger('id_bus');
            $table->timestamps();

            $table->foreign('id_bus')->references('id')->on('tb_bus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_laporan');
    }
}
