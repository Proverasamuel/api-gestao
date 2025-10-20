<?php
// database/migrations/2025_10_16_000003_create_lojas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lojas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('localizacao')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('lojas');
    }
};

