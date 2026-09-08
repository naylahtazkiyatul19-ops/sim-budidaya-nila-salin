<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kolam', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembudidaya_id');
            $table->string('nama_kolam');
            $table->decimal('luas', 10, 2)->nullable();
            $table->text('lokasi')->nullable();
            $table->enum('status', ['aktif', 'nonaktif', 'kosong'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kolam');
    }
};