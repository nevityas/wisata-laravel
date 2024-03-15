<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_paket', function (Blueprint $table) {
            $table->id();
            $table->string('name_paket');
            $table->unsignedBigInteger('id_paket_wisata');
            $table->foreign('id_paket_wisata')->references('id')->on('paket_wisata')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah_pelanggan');
            $table->BigInteger('harga_paket');
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
        Schema::dropIfExists('daftar_paket');
    }
};
