<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->enum('match_type', ['best_of', 'custom', 'first_to', 'ow_best_of']);
            $table->enum('status', ['canceled', 'finished', 'not_started', 'postponed', 'running']);
            $table->string('official_stream_url', 2048)->nullable();
            $table->string('name', 2048)->nullable();
            $table->string('live_url', 2048)->nullable();
            $table->string('live_embed_url', 2048)->nullable();
            $table->string('videogame_version')->nullable();
            $table->json('results');
            $table->tinyInteger('number_of_games');
            $table->boolean('rescheduled')->default(true);
            $table->boolean('detailed_status')->default(true);
            $table->boolean('forfeit')->default(false);
            $table->boolean('draw')->default(false);

            $table->bigInteger('tournament_id')->unsigned()->nullable();
            $table->bigInteger('league_id')->unsigned()->nullable();
            $table->bigInteger('serie_id')->unsigned()->nullable();
            $table->bigInteger('game_advantage')->unsigned()->nullable();
            $table->bigInteger('winner_id')->unsigned()->nullable();

            $table->timestamp('original_scheduled_at')->nullable();
            $table->timestamp('begin_at')->nullable();
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamp('modified_at')->nullable();

            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->foreign('winner_id')->references('id')->on('commands')->onDelete('cascade');
            $table->foreign('game_advantage')->references('id')->on('commands')->onDelete('cascade');
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
