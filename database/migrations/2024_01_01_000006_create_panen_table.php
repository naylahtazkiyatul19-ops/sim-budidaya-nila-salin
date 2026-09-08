<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('panen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kolam_id');
            $table->date('tanggal_panen');
            $table->decimal('berat_panen', 10, 2);
            $table->decimal('harga_per_kg', 10, 2)->nullable();
            $table->enum('status', ['tersedia', 'terjual', 'habis'])->default('tersedia');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('panen');
    }
};