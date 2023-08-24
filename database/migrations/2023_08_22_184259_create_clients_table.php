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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('cpf', 14)->unique();
            $table->date('data_nascimento');
            $table->string('rua');
            $table->string('numero_rua');
            $table->char('cep', 9);
            $table->string('cidade');
            $table->char('estado', 2);
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            $table->index(['nome', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
