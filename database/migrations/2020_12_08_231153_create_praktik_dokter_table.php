<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraktikDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praktik_dokter', function (Blueprint $table) {
            $table->id();
            $table->string('sip',255)->nullable();
            $table->string('nama_dokter',50);
            $table->string('jenis_dokter',50);
            $table->string('foto',255)->nullable();
            $table->string('kode_antrian',5);
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
        Schema::dropIfExists('praktik_dokter');
    }
}
