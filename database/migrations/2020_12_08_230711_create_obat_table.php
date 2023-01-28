<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->string('id_obat',100)->primary();
            $table->string('nama_obat', 50);            
            $table->string('satuan', 50);             
            $table->BigInteger('harga_modal')->unsigned();
            $table->BigInteger('harga_jual')->unsigned();
            $table->BigInteger('stok')->unsigned();
            $table->string('foto', 255);    
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
        Schema::dropIfExists('obat');
    }
}
