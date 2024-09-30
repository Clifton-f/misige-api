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
        Schema::create('papel_permissao', function (Blueprint $table) {
            $table->unsignedBigInteger('papelId');
            $table->unsignedBigInteger('permissaoId');
            $table->foreign('papelId')->references('id')->on('papeis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('permissaoId')->references('id')->on('permissoes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papel_permissao');
    }
};
