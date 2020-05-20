<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'leagues'], function (){
    Route::get('/', 'LeaguesController@list')->name('leagues.list');
    Route::get('details/{id}', 'LeaguesController@details')->name('leagues.details');
    Route::post('create', 'LeaguesController@create')->name('leagues.create');
});


Route::group(['prefix' => 'commands'], function (){
    Route::get('/', 'CommandsController@list')->name('commands.list');
    Route::get('details/{id}', 'CommandsController@details')->name('commands.details');
    Route::post('create', 'CommandsController@create')->name('commands.create');
});

Route::group(['prefix' => 'game'], function (){
    Route::get('/', 'GamesController@list')->name('commands.list');
    Route::get('details/{id}', 'GamesController@details')->name('commands.details');
    Route::post('create', 'GamesController@create')->name('commands.create');
});

Route::group(['prefix' => 'matches'], function (){
    Route::get('/', 'MatchesController@list')->name('matches.list');
    Route::get('details/{id}', 'MatchesController@details')->name('matches.details');
    Route::post('create', 'MatchesController@create')->name('matches.create');
});

Route::group(['prefix' => 'series'], function (){
    Route::get('/', 'SeriesController@list')->name('series.list');
    Route::get('details/{id}', 'SeriesController@details')->name('series.details');
    Route::post('create', 'SeriesController@create')->name('series.create');
});

Route::group(['prefix' => 'tournaments'], function (){
    Route::get('/', 'TournamentsController@list')->name('tournaments.list');
    Route::get('details/{id}', 'TournamentsController@details')->name('tournaments.details');
    Route::post('create', 'TournamentsController@create')->name('tournaments.create');
});
