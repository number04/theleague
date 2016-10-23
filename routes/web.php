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

            Route::group(['prefix' => 'manage'], function()
                {
                    Route::get('/', 'ManageController@roster')->name('franchise-manage');

                    Route::post('/sign', 'ManageController@sign');
                    Route::post('/release', 'ManageController@release');
                    Route::post('/show', 'ManageController@show');
                    Route::post('/farm', 'ManageController@farm');
                    Route::post('/injured', 'ManageController@injured');
                    Route::post('/activate', 'ManageController@activate');
                });
        });

    Route::get('/franchise/{franchise}', 'FranchiseController@franchise')->name('franchise');

    Route::get('/scoreboard-w{week_number}', 'ScoreboardController@scoreboard')->name('scoreboard');

    Route::get('/standings', 'StandingController@standing')->name('standing');

    Route::get('/rosters', 'RosterController@roster')->name('roster');

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
