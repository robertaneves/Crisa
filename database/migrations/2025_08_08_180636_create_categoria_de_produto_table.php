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
        Schema::create('categoria_de_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('categoria')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('produto')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_de_produtos');
    }
};