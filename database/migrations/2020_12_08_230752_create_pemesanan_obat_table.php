<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_obat', function (Blueprint $table) {
            $table->string('id_pemesanan',255)->primary();
            $table->unsignedBigInteger('id_pasien')->nullable();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')
            ->onDelete('no action')
            ->onUpdate('no action');
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->foreign('id_admin')->references('id_admin')->on('admin')
            ->onDelete('no action')
            ->onUpdate('no action');
            $table->string('no_telepon',15)->nullable();
            $table->string('status', 50);
            $table->integer('metode_pembayaran')->nullable();    
            $table->timestamp('waktu');
            $table->string('ket_batal', 255)->nullable();    
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
        Schema::dropIfExists('pemesanan_obat');
    }
}
