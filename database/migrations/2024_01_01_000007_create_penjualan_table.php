<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panen_id');
            $table->unsignedBigInteger('pembudidaya_id');
            $table->date('tanggal_penjualan');
            $table->decimal('jumlah_kg', 10, 2);
            $table->decimal('harga_per_kg', 10, 2);
            $table->decimal('total_harga', 10, 2);
            $table->string('pembeli')->nullable();
            $table->string('no_hp_pembeli')->nullable();
            $table->enum('metode_penjualan', ['langsung_tambak', 'pembeli_datang'])->default('langsung_tambak');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
};