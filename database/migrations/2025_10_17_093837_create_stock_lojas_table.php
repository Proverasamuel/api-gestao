<?php

// database/migrations/2025_10_16_000007_create_stock_loja_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('stock_loja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loja_id')->constrained()->cascadeOnDelete();
            $table->foreignId('produto_id')->constrained()->cascadeOnDelete();
            $table->integer('quantidade')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('stock_loja');
    }
};

