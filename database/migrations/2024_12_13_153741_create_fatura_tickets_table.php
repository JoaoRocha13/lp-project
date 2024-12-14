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
        Schema::create('fatura_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignID('fatura_id')->constrainted('fatura')->onDelete('cascade');
            $table->foreignID('ticket_id')->constrainted('tickets')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fatura_tickets');
    }
};
