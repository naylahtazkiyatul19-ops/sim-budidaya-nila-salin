<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('promosi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panen_id');
            $table->unsignedBigInteger('pembudidaya_id');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->decimal('harga', 10, 2);
            $table->decimal('stok', 10, 2);
            $table->string('no_whatsapp')->nullable();
            $table->text('lokasi_tambak')->nullable();
            $table->enum('status', ['aktif', 'nonaktif', 'terjual'])->default('aktif');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promosi');
    }
};