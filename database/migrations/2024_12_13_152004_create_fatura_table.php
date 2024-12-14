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
        Schema::create('fatura', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id()')->constrained()->onDelete('cascade');
            $table->enum('status', ['Pendente', 'Pago', 'Cancelado'])->default('Pendente');
            $table->decimal('valor', 8, 2)->default(0);
            $table->enum('type', ['merch', 'ticket']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fatura');
    }
};
