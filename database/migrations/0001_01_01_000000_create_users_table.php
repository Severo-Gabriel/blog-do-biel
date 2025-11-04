<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cria a tabela users
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();                 // ID automático
            $table->string('name');       // Nome do usuário
            $table->string('email')->unique(); // E-mail único
            $table->string('password');   // Senha criptografada
            $table->timestamps();         // created_at e updated_at
        });
    }

    /**
     * Remove a tabela users
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
