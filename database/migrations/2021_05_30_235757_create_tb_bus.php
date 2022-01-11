<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bus', function (Blueprint $table) {
            $table->id('id');
            $table->string('kode',255);
            $table->string('password',255);
            $table->string('tipe',255);
            $table->unsignedBigInteger('tahun');
            $table->unsignedBigInteger('kilometer');
            $table->string('foto',255);
            $table->unsignedBigInteger('id_chassis');
            $table->unsignedBigInteger('id_man');
            $table->timestamps();

            $table->foreign('id_chassis')->references('id')->on('tb_chassis');
            $table->foreign('id_man')->references('id')->on('tb_manufaktur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_bus');
    }
}
