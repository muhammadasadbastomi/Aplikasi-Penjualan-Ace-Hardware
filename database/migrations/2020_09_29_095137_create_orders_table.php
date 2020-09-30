<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->length(36);
            $table->unsignedBigInteger('barang_id');
            $table->string('jumlah_order');
            $table->integer('diskon_order')->nullable();
            $table->integer('harga_order');
            $table->integer('total_order');
            $table->string('nama_order');
            $table->string('alamat_order');
            $table->string('telp_order');
            $table->string('email_order');
            $table->date('tgl_awal');
            $table->date('tgl_order');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('orders');
    }
}
