<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('lft')->nullable();
            $table->integer('rgt')->nullable();
            $table->integer('depth')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('description');
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->integer('update_by')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('pages', function (Blueprint $table){
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table){
            $table->dropForeign('pages_language_id_foreign');
            $table->dropForeign('pages_user_id_foreign');
        });
        Schema::drop('pages');
    }
}
