<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemberian_pakan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kolam_id');
            $table->unsignedBigInteger('pakan_id');
            $table->date('tanggal');
            $table->decimal('jumlah', 10, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemberian_pakan');
    }
};