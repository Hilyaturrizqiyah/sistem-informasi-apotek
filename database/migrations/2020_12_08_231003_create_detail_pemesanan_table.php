<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan', function (Blueprint $table) {
            $table->id('id_detail_pemesanan');
            $table->string('id_pemesanan',255);
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan_obat')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('id_obat',100);
            $table->foreign('id_obat')->references('id_obat')->on('obat')
            ->onDelete('no action')
            ->onUpdate('no action');
            $table->BigInteger('jumlah');            
            $table->BigInteger('harga_jumlah');             
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
        Schema::dropIfExists('detail_pemesanan');
    }
}
