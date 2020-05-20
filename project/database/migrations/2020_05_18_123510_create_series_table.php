<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('name')->nullable();
            $table->string('season')->nullable();
            $table->text('slug');
            $table->text('description')->nullable();
            $table->string('tier')->nullable();
            $table->enum('winner_type', ['Player', 'Team'])->nullable();
            $table->bigInteger('league_id')->unsigned()->nullable();
            $table->bigInteger('winner_id')->unsigned()->nullable();
            $table->integer('year');
            $table->timestamp('begin_at');
            $table->timestamp('modified_at')->nullable();
            $table->timestamp('end_at')->nullable();

            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
            $table->foreign('winner_id')->references('id')->on('commands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
