<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamp('begin_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->boolean('detailed_stats')->default(true);
            $table->boolean('finished')->default(true);
            $table->boolean('forfeit')->default(true);
            $table->tinyInteger('length')->nullable();
            $table->bigInteger('match_id')->unsigned()->nullable();
            $table->tinyInteger('position');
            $table->enum('status', ['finished', 'not_played', 'not_started', 'running']);
            $table->string('video_url', 2048)->nullable();
            $table->bigInteger('winner_id')->unsigned()->nullable();
            $table->enum('winner_type', ['Player', 'Team'])->nullable();

            $table->foreign('winner_id')->references('id')->on('commands')->onDelete('cascade');
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
