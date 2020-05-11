<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangDatangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_datangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->length(36);
            $table->string('id_barang');
            $table->string('nama_pembeli');
            $table->date('tgl_pengiriman');
            $table->date('alamat_pengiriman');
            $table->string('jumlah');
            $table->string('status');
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
        Schema::dropIfExists('barang_datangs');
    }
}
