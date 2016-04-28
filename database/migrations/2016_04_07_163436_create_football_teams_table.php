<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootballTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_teams', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unique()->unsigned();
            $table->boolean('is_national')->nullable();
            $table->string('name')->nullable();
            $table->string('shortname')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->string('country')->nullable();
            $table->string('founded')->nullable();
            $table->string('leagues')->nullable();
            $table->integer('venue_id')->unique()->unsigned();
            $table->string('venue_name')->nullable();
            $table->string('venue_surface')->nullable();
            $table->string('venue_address')->nullable();
            $table->string('venue_city')->nullable();
            $table->integer('venue_capacity')->nullable()->unsigned();
            $table->integer('coach_id')->nullable()->unsigned();
            $table->string('coach_name')->nullable();
            $table->text('detail')->nullable();
            $table->unsignedInteger('update_by')->nullable();
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
        Schema::drop('football_teams');
    }
}
