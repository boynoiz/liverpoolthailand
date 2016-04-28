<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootballStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_standings', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('comp_id')->unsigned();
            $table->string('season', 50);
            $table->smallInteger('round');
            $table->integer('stage_id');
            $table->string('comp_group', 10)->nullable();
            $table->string('country', 50);
            $table->integer('team_id')->unique()->unsigned();
            $table->string('team_name', 100);
            $table->string('status', 10);
            $table->string('recent_form', 10);
            $table->smallInteger('position');
            $table->smallInteger('overall_gp');
            $table->smallInteger('overall_w');
            $table->smallInteger('overall_d');
            $table->smallInteger('overall_l');
            $table->smallInteger('overall_gs');
            $table->smallInteger('overall_ga');
            $table->smallInteger('home_gp');
            $table->smallInteger('home_w');
            $table->smallInteger('home_d');
            $table->smallInteger('home_l');
            $table->smallInteger('home_gs');
            $table->smallInteger('home_ga');
            $table->smallInteger('away_gp');
            $table->smallInteger('away_w');
            $table->smallInteger('away_d');
            $table->smallInteger('away_l');
            $table->smallInteger('away_gs');
            $table->smallInteger('away_ga');
            $table->smallInteger('gd');
            $table->smallInteger('points');
            $table->string('description', 150)->nullable();
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
        Schema::drop('football_standings');
    }
}
