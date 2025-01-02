<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->id(); // ID da fatura
            $table->unsignedBigInteger('user_id'); // ID do usuário (FK)
            $table->string('nome'); // Nome do cliente
            $table->string('codigo_postal'); // Código postal
            $table->string('localidade'); // Localidade
            $table->string('telefone'); // Número de telefone
            $table->json('itens'); // Itens comprados, armazenados em formato JSON
            $table->decimal('total', 10, 2); // Total da fatura
            $table->timestamps(); // Campos created_at e updated_at

            // Definição de chave estrangeira
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faturas');
    }
};
