<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootballMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_matches', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unique()->unsigned();
            $table->integer('comp_id')->unsigned();
            $table->string('formatted_date', 12);
            $table->string('season', 12);
            $table->string('week')->nullable();
            $table->string('venue')->nullable();
            $table->integer('venue_id')->nullable();
            $table->string('venue_city')->nullable();
            $table->string('status', 6);
            $table->smallInteger('timer')->nullable();
            $table->string('time', 5);
            $table->integer('localteam_id');
            $table->string('localteam_name');
            $table->string('localteam_score', 2);
            $table->integer('visitorteam_id');
            $table->string('visitorteam_name');
            $table->string('visitorteam_score', 2);
            $table->string('ht_score', 6)->nullable();
            $table->string('ft_score', 6)->nullable();
            $table->string('et_score', 6)->nullable();
            $table->string('penalty_local', 6)->nullable();
            $table->string('penalty_visitor', 6)->nullable();
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
        Schema::drop('football_matches');
    }
}
