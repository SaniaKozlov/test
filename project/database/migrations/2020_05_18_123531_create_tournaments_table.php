<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('prizepool')->nullable();
            $table->enum('winner_type', ['Player', 'Team'])->nullable();
            $table->bigInteger('league_id')->unsigned()->nullable();
            $table->bigInteger('serie_id')->unsigned()->nullable();
            $table->bigInteger('winner_id')->unsigned()->nullable();
            $table->boolean('live_supported')->default(false);
            $table->timestamp('begin_at');
            $table->timestamp('end_at')->nullable();
            $table->timestamp('modified_at')->nullable();

            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
            $table->foreign('winner_id')->references('id')->on('commands')->onDelete('cascade');
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
        Schema::dropIfExists('tournaments');
    }
}
