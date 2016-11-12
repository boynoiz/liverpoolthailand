<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'root', 'uses' => 'MainController@index']);
Route::get('no-transition', ['as' => 'root', 'uses' => 'MainController@index']);
Route::get('home', ['as' => 'root', 'uses' => 'MainController@index']);
Route::get('board', function () {
    return redirect(url('http://board.liverpoolthailand.com'));
});
Route::get('articles', ['as' => 'article', 'uses' => 'ArticleController@index']);
Route::get('article/{article_slug}', ['as' => 'article.show', 'uses' => 'ArticleController@show']);
Route::get('page/{page_slug}', ['as' => 'page', 'uses' => 'PageController@index']);
Route::get('category/{category_slug}', ['as' => 'category', 'uses' => 'CategoryController@index']);
Route::post('language/change', ['as' => 'app.language.change' , 'uses' => 'LanguageController@postChange']);
Route::get('assets/images/{source}/cache/{path}', function ($source, $path, Illuminate\Http\Request $request) {
    $server = League\Glide\ServerFactory::create([
        'source' => Storage::disk($source)->getDriver(),
        'cache' => Storage::disk('local')->getDriver(),
        'cache_path_prefix' => 'images/.cache',
        'base_url' => 'assets/images/'. $source . '/cache',
    ]);
    $server->outputImage($path, $request->all());
})->where('path', '.+');
