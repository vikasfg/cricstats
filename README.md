# Cricket Assignment- World Cup'19 Events

It have 4 module
1. Team
2. Players Under Team
3. Fixture
4. Point Table

In route we have defined all url's of application. Team, players, Fixture and Point table Link.
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
