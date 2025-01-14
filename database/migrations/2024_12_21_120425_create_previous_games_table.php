<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviousGamesTable extends Migration
{
    public function up()
    {
        Schema::create('previous_games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id')->nullable(); // Relacionamento com a tabela games
            $table->string('team_a');
            $table->string('team_b');
            $table->integer('score_a');
            $table->integer('score_b');
            $table->timestamp('game_date');
            $table->string('local')->nullable(); // Adiciona o campo local
            $table->decimal('ticket_price', 8, 2)->nullable(); // Adiciona o campo ticket_price
            $table->integer('tickets_available')->nullable(); // Adiciona o campo tickets_available
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('previous_games');
    }
}
