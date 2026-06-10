<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users','id')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignUuid('produk_id')->constrained('produks','id')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('total');
            $table->text('alamat');
            $table->text('pesan')->nullable();
            $table->enum('status_pembayaran', ['belum bayar', 'sudah bayar']);
            $table->enum('status_pesanan', ['menunggu pembayaran', 'dikemas', 'dikirim', 'selesai', 'dibatalkan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
