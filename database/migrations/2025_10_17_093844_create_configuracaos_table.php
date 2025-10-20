<?php

// database/migrations/2025_10_16_000011_create_configuracoes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('configuracoes', function (Blueprint $table) {
            $table->id();
            $table->string('chave')->unique();
            $table->string('valor');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('configuracoes');
    }
};

