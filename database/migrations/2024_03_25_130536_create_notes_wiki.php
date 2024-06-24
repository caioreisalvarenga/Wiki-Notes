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
        Schema::create('notes_wiki', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->date('data')->nullable();
            $table->string('imagem')->nullable();
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }
  
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes_wiki');
    }
};
