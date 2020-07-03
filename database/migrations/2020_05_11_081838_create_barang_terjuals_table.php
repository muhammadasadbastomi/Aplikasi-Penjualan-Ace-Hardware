<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTerjualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_terjuals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->length(36);
            $table->unsignedBigInteger('barang_id');
            $table->integer('jumlah_terjual');
            $table->integer('diskon_terjual')->nullable();
            $table->integer('harga_terjual');
            $table->integer('total_terjual');
            $table->date('tgl_terjual');
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
        Schema::dropIfExists('barang_terjuals');
    }
}
