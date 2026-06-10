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
        Schema::create('rating_produks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pembelian_id')->constrained('pembelians','id')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignUuid('user_id')->constrained('users','id')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('rating');
            $table->text('ulasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_produks');
    }
};
