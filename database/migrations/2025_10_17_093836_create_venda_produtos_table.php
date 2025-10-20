<?php

// database/migrations/2025_10_16_000006_create_venda_produto_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('venda_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venda_id')->constrained()->cascadeOnDelete();
            $table->foreignId('produto_id')->constrained()->cascadeOnDelete();
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('venda_produto');
    }
};

