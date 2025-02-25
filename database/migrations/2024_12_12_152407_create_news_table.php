<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('news', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable();
        $table->text('description')->nullable();
        $table->date('date')->nullable();
        $table->string('image')->nullable(); // Para o caminho da imagem
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('news');
}
};
