<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pakan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pakan');
            $table->decimal('stok', 10, 2);
            $table->string('satuan')->default('kg');
            $table->decimal('harga', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pakan');
    }
};