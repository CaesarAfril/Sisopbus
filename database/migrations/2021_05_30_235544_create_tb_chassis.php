<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbChassis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_chassis', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama',255);
            $table->string('mesin',255);
            $table->string('jenis_transmisi',255);
            $table->string('transmisi',255);
            $table->string('suspensi',255);
            $table->unsignedBigInteger('id_man');
            $table->timestamps();

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
        Schema::dropIfExists('tb_chassis');
    }
}
