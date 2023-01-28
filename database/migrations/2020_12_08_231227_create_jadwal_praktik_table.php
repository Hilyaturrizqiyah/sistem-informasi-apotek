<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPraktikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_praktik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_praktik');
            $table->foreign('id_praktik')->references('id')->on('praktik_dokter')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('hari',10);
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
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
        Schema::dropIfExists('jadwal_praktik');
    }
}
