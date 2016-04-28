<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootballCompetitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_competition', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('comp_id')->unique()->unsigned();
            $table->string('name');
            $table->string('region');
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
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
        Schema::drop('football_competition');
    }
}
