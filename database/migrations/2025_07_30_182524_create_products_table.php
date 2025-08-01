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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Coluna 'id' auto-incrementável e chave primária
            $table->string('nome'); // Coluna para o nome do produto (texto curto)
            $table->text('descricao'); // Coluna para a descrição (texto mais longo)
            $table->decimal('preco', 30, 2); // Coluna para o preço: 8 dígitos no total, 2 casas decimais

            // Se precisar de 'funcao' também, pode adicionar de volta:
            // $table->string('funcao')->nullable(); // Exemplo de 'funcao' opcional

            $table->timestamps(); // Cria 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};