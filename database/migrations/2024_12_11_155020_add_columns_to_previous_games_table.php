<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPreviousGamesTable extends Migration
{
    public function up()
    {
        Schema::table('previous_games', function (Blueprint $table) {
            $table->string('team_a')->nullable()->after('id');
            $table->string('team_b')->nullable()->after('team_a');
            $table->string('team_a_logo')->nullable()->after('team_b');
            $table->string('team_b_logo')->nullable()->after('team_a_logo');
            $table->integer('score_a')->default(0)->after('team_b_logo');
            $table->integer('score_b')->default(0)->after('score_a');
            $table->date('game_date')->nullable()->after('score_b');
        });
    }

    public function down()
    {
        Schema::table('previous_games', function (Blueprint $table) {
            $table->dropColumn([
                'team_a',
                'team_b',
                'team_a_logo',
                'team_b_logo',
                'score_a',
                'score_b',
                'game_date',
            ]);
        });
    }
}
