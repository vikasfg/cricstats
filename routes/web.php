<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get ( '/index', function () {
	return view ( 'home' );
} );

Route::get('/', function () {
    return view('home');
});

// front urls
Route::get ( '/teams/', 'TeamController@getTeams' );
Route::get ( '/teams/{team_id}', 'TeamController@getPlayers' );
Route::get ( '/teams/{team_id}/{player_id}', 'TeamController@getPlayersDetails' );
Route::get ( '/points/', 'TeamController@getPoints' );
Route::get ( '/fixtures/', 'TeamController@fixtures' );

//Team Admin
Route::get ( '/admin/add-team', 'CricketController@addTeam' );
Route::post ( '/admin/add-team', 'CricketController@addTeam' );
Route::get ( '/admin/update-team/{id}', 'CricketController@updateTeam' );
Route::post ( '/admin/update-team/{id}', 'CricketController@updateTeam' );
Route::get ( '/admin/list-team', 'CricketController@listTeam' );
Route::get ( '/admin/delete-team', 'CricketController@delete_team' );

Auth::routes ();


