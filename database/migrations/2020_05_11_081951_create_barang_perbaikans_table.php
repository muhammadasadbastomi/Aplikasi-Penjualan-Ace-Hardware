<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangPerbaikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_perbaikans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->length(36);
            $table->unsignedBigInteger('barang_id');
            $table->string('nama_barang');
            $table->date('tgl_diperbaiki');
            $table->date('tgl_estimasi');
            $table->string('kerusakan');
            $table->string('jumlah');
            $table->timestamps();
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_perbaikans');
    }
}
