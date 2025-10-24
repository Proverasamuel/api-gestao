<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            //

            $table->string('icone')->nullable();  // ícone (classe FontAwesome)
            $table->string('imagem')->nullable(); // caminho da imagem (opcional)
            $table->string('status')->default('ativo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['imagem', 'icone']);
        });
    }
};
