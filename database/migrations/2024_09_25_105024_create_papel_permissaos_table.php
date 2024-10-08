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

        Schema::create('users', function (Blueprint $table) {
            $table->comment('Tabela geral de usuários');
            $table->id();
            $table->string('nome')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');;
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('BI');
            $table->string('NUIT');
            $table->string('contacto_1',11);
            $table->string('contacto_2',11)->nullable();
            $table->unsignedBigInteger('papel');
            $table->foreign('papel')->references('id')->on('papeis')->nullOnDelete()->cascadeOnUpdate();
            
            
            $table->rememberToken();
            $table->timestamps();

         
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });


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
