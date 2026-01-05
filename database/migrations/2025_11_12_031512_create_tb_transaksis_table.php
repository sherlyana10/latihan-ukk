<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_transaksis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('barang_id')
                ->constrained('tb_barangs')
                ->onDelete('cascade');

            $table->integer('harga');
            $table->integer('diskon');
            $table->integer('total_harga');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_transaksis');
    }
};
