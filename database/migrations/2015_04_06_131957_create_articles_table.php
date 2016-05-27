<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->date('published_at');
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->integer('read_count')->default(0);
            $table->integer('update_by')->unsigned()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
        Schema::table('articles', function (Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table){
            $table->dropForeign('articles_category_id_foreign');
        });
        Schema::drop('articles');
    }
}
