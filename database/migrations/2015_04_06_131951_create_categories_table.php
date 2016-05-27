<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->integer('update_by')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('categories', function (Blueprint $table){
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table){
            $table->dropForeign('categories_language_id_foreign');
        });
        Schema::drop('categories');
    }
}
