<?php

Route::group(['middleware' => 'web'], function () {
    // Application routes
    Route::group(['namespace' => 'Application'], function () {
        Route::get('/', ['as' => 'root', 'uses' => 'MainController@index']);
        Route::get('no-transition', ['as' => 'root', 'uses' => 'MainController@index']);
        Route::get('home', ['as' => 'root', 'uses' => 'MainController@index']);
        Route::get('board', function (){
            return redirect(url('http://board.liverpoolthailand.com'));
        });
        Route::get('articles', ['as' => 'article', 'uses' => 'ArticleController@index']);
        Route::get('article/{article_slug}', ['as' => 'article.show', 'uses' => 'ArticleController@show']);
        Route::get('page/{page_slug}', ['as' => 'page', 'uses' => 'PageController@index']);
        Route::get('category/{category_slug}', ['as' => 'category', 'uses' => 'CategoryController@index']);
        Route::post('language/change', ['as' => 'app.language.change' , 'uses' => 'LanguageController@postChange']);
    });
    // Auth routes
    Route::group(['namespace' => 'Auth'], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::get('/', ['as' => 'auth.root', 'uses' => 'AuthController@getLogin']);
            Route::get('login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
            Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);
            Route::get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);
        });
        Route::group(['prefix' => 'password'], function () {
            Route::get('email', ['as' => 'password.email', 'uses' => 'PasswordController@getEmail']);
            Route::post('email', ['as' => 'password.email', 'uses' => 'PasswordController@postEmail']);
            Route::get('reset/{token?}', ['as' => 'password.reset', 'uses' => 'PasswordController@showResetForm']);
            Route::post('reset', ['as' => 'password.reset', 'uses' => 'PasswordController@postReset']);
        });
    });
});

// API routes
Route::group(['prefix' => 'api', 'namespace' => 'Api', 'middleware' => 'api'], function () {
    Route::get('football/live', 'FootballAPIController@live');
});

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
    // GET
    Route::get('/', ['as' => 'admin.root', 'uses' => 'DashboardController@getIndex']);
    Route::get('setting', ['as' => 'admin.setting.index', 'uses' => 'SettingController@getSettings']);
    Route::get('analytics', ['as' => 'admin.analytics.index', 'uses' => 'AnalyticsController@getIndex']);
    // POST
    Route::post('language/change', ['as' => 'admin.language.change' , 'uses' => 'LanguageController@postChange']);
    Route::post('page/order', ['as' => 'admin.page.order' , 'uses' => 'PageController@postOrder']);
    // PATCH
    Route::patch('setting/{setting}', ['as' => 'admin.setting.update', 'uses' => 'SettingController@patchSettings']);
    // Resources
    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController');
    Route::resource('language', 'LanguageController');
    Route::resource('page', 'PageController');
    Route::resource('user', 'UserController');
    Route::resource('football/teams', 'FootballTeamsController');
    Route::resource('football/competitions', 'FootballCompetitionsController');

    Route::get('football', ['as' => 'admin.football.index', 'uses' => 'FootballController@showStanding']);
    Route::get('football/standing', ['as' => 'admin.football.index', 'uses' => 'FootballController@showStanding']);
    Route::get('football/fixtures', ['as' => 'admin.football.fixtures', 'uses' => 'FootballController@showFixtures']);
    Route::get('football/matches/{matchId}/events', ['as' => 'admin.football.matches.events', 'uses' => 'FootballController@showEvents']);
    Route::get('football/api/events', ['as' => 'admin.football.matches.events.fetch', 'uses' => 'FootballController@getAllMatchEvents']);
    Route::get('football/api/competitions', ['as' => 'admin.football.competitions.fetch', 'uses' => 'FootballController@updateOrCreateComp']);
    Route::get('football/api/teams', ['as' => 'admin.football.teams.fetch', 'uses' => 'FootballController@updateOrCreateTeams']);
    Route::get('football/api/fixtures', ['as' => 'admin.football.fixture.fetch', 'uses' => 'FootballController@createOrUpdateFixtures']);
    Route::get('football/api/standing', ['as' => 'admin.football.standing.fetch', 'uses' => 'FootballController@createOrUpdateStanding']);
    Route::get('football/api/live', ['as' => 'admin.football.game.live', 'uses' => 'FootballController@LiveMatch']);

});