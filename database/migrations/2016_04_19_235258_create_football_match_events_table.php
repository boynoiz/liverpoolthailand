<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootballMatchEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_match_events', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('event_id')->unique()->unsigned();
            $table->integer('match_id')->unsigned();
            $table->string('type');
            $table->integer('minute');
            $table->integer('extra_min')->nullable();
            $table->string('team');
            $table->string('player');
            $table->integer('player_id')->unsigned();
            $table->string('assist')->nullable();
            $table->integer('assist_id')->unsigned()->nullable();
            $table->string('result');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('football_match_events');
    }
}
