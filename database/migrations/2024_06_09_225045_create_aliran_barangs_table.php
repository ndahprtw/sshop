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
        Schema::create('aliran_barangs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('produk_id')->constrained('produks','id')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('stok');
            $table->string('penanggung_jawab');
            $table->enum('jenis', ['barang masuk', 'barang keluar']);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aliran_barangs');
    }
};
