<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id('id_konsultasi');
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')
            ->onDelete('no action')
            ->onUpdate('no action');
            $table->unsignedBigInteger('id_apoteker')->nullable();
            $table->foreign('id_apoteker')->references('id_apoteker')->on('apoteker')
            ->onDelete('no action')
            ->onUpdate('no action');
            $table->string('pertanyaan',255); 
            $table->string('jawaban',255)->nullable();
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
        Schema::dropIfExists('konsultasi');
    }
}
