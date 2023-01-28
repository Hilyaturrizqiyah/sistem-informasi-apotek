<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->id('id_antrian');
            $table->unsignedBigInteger('id_pasien')->nullable();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->unsignedBigInteger('id_praktik');
            $table->foreign('id_praktik')->references('id')->on('praktik_dokter');
            $table->string('nama_pasien',50);
            $table->string('no_telepon',15);
            $table->string('alamat',255);
            $table->string('nomor_antrian',10);
            $table->date('waktu_hari');
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
        Schema::dropIfExists('antrian');
    }
}
