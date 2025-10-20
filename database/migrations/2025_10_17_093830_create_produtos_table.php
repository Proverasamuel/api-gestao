<?php

// database/migrations/2025_10_16_000002_create_produtos_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('marca')->nullable();
            $table->string('referencia')->nullable();
            $table->foreignId('categoria_id')->constrained()->cascadeOnDelete();
            $table->integer('quantidade_total')->default(0); // stock geral
            $table->decimal('preco', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('produtos');
    }
};

