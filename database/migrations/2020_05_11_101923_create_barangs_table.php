<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->length(36);
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('satuan_id')->nullable();
            $table->string('nama_barang');
            $table->string('kode_barang');
            $table->string('departement');
            $table->string('harga_jual');
            $table->string('harga_beli');
            $table->tinyInteger('kategori');
            $table->string('keterangan')->nullable();
            $table->integer('stok_tersedia');
            $table->integer('diskon')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->string('gambar')->default('default.png');
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
