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

//Common Urls
Route::get ( '/userprofile/{device_id}', 'UserController@getUsersprofileDetail' );
Route::get ( '/user-profile-guest/{device_id}', 'UserController@getUsersprofileGuestDetail' );
Route::get ( '/admin/', 'AdminController@adminIndexPages' );
Route::get ( '/admin/index', 'AdminController@adminIndexPage' );
Route::get ( '/admin/login', 'AdminController@adminIndexPage' );
Route::get ( '/confirmation/{token}', 'UserController@confirmation' );
Route::post ( '/admin/login', 'AdminController@Authuanticate' );
Route::get ( '/admin/dashboard', 'AdminController@adminDashboardPage' );

//Admin profile Urls
Route::get ( '/admin/update-profile', 'AdminController@updateProfile' );
Route::post ( '/admin/update-profile-data', 'AdminController@updateProfileData' );
Route::get ( '/admin/change-password', 'AdminController@changePassword' );
Route::post ( '/admin/change-password-data', 'AdminController@changePasswordData' );

// Admin user manage routes
Route::get ( '/admin/add-user', 'AdminController@viewAddUser' );
Route::post ( '/admin/add-user', 'AdminController@addUser' );
Route::get ( '/admin/users', 'AdminController@users_list' );
Route::get ( '/admin/update-user/{id}', 'AdminController@updateUser' );
Route::post ( '/admin/update-user-data', 'AdminController@updateUserData' );
Route::get ( '/admin/delete-user/{id}', 'AdminController@deleteUser' );
Route::get ( '/admin/enable-disable-user/{id}', 'AdminController@enableDisableUser' );
Route::get ( '/admin/users-list', 'AdminController@users_list' );


Route::get ( '/admin/logout/', function () {
	Auth::logout ();
	Session::flash ( 'confirm', 'Logged out successfully ! Visit again.' );
	return Redirect::to ( '/admin/index' );
} );

Auth::routes ();


