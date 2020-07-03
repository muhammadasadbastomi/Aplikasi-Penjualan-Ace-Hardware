<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangGaransisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_garansis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->length(36);
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('pembeli_id');
            $table->date('tgl_pembelian');
            $table->date('tgl_akhir_garansi');
            $table->string('jumlah');
            $table->timestamps();
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('restrict');
            $table->foreign('pembeli_id')->references('id')->on('pembelis')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_garansis');
    }
}
