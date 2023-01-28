<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_obat', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->string('id_pemesanan',255);
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan_obat')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->BigInteger('nominal')->unsigned();
            $table->string('bukti_tf', 255);
            $table->string('status', 50);
            $table->timestamp('waktu');           
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
        Schema::dropIfExists('pembayaran_obat');
    }
}
