<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangPengirimansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_pengirimans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->length(36);
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('pembeli_id');
            $table->string('kode_pengiriman');
            $table->date('tgl_pengiriman');
            $table->string('jumlah');
            $table->string('status');
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
        Schema::dropIfExists('barang_pengirimans');
    }
}
