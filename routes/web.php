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



Auth::routes();

Route::get('/register', function () {
    return view('register');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'franchise'], function()
        {
            Route::get('/', 'FranchiseController@franchiseUser')->name('franchise-user');

            Route::post('/', 'FranchiseController@franchisePost');

            Route::group(['prefix' => 'roster'], function()
                {
                    Route::get('/', 'RosterController@roster')->name('franchise-roster');

                    Route::post('/sign', 'RosterController@sign');
                    Route::post('/release', 'RosterController@release');
                    Route::post('/show', 'RosterController@show');
                    Route::post('/farm', 'RosterController@farm');
                    Route::post('/injured', 'RosterController@injured');
                    Route::post('/activate', 'RosterController@activate');
                });
        });

    Route::get('/franchise/{franchise}', 'FranchiseController@franchise')->name('franchise');

    Route::get('/scoreboard-w{week_number}', 'ScoreboardController@scoreboard')->name('scoreboard');

    Route::get('/standings', 'StandingController@standing')->name('standing');

    Route::get('/skater/{type}/{position}', 'PlayerController@skater')->name('skater');
    Route::get('/goalie/{type}/{position}', 'PlayerController@goalie')->name('goalie');

    Route::post('/search-skater', 'PlayerController@findSkater');
    Route::post('/search-goalie', 'PlayerController@findGoalie');
    Route::post('/filter', 'PlayerController@filter');


    Route::get('/tabs', function () {
        return view('tabs');
    });

    Route::get('/stats-week', function () {
        return view('stats-week');
    });

    Route::get('/stats-year', function () {
        return view('stats-year');
    });

    Route::get('/test', function () {
        return view('test');
    });
});
