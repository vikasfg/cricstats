<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\ErrorCodes;
use App\Http\SuccessCodes;
use DB;
use App\Team;

class TeamController extends Controller {
  
  public function getTeams() {

		$teams = DB::table ( 'cricket_teams' )
		->leftJoin ( 'cricket_team_pictures', 'cricket_team_pictures.team_id', '=', 'cricket_teams.id' )
		->orderBy ( 'cricket_teams.name', 'asc' )
		->select ('cricket_teams.*', 'cricket_team_pictures.image')
		->paginate(5);
		return view ( "team", [ 
				"confirm",
				'teams' => $teams 
		] );
	}

	public function getPlayers($teamId) {
		$team = Team::find ( $teamId );
		$players = DB::table ( 'cricket_all_players' )
		->leftJoin ( 'cricket_teams', 'cricket_teams.id', '=', 'cricket_all_players.team_id' )
		->leftJoin ( 'cricket_team_pictures', 'cricket_team_pictures.team_id', '=', 'cricket_teams.id' )
		->orderBy ( 'cricket_all_players.player_name', 'asc' )
		->where('cricket_all_players.team_id', $teamId)
		->select ('cricket_all_players.*', 'cricket_team_pictures.image as teamImage', 'cricket_teams.name as teamName')
		->paginate(10);
		return view ( "players", [ 
				"confirm",
				'players' => $players,
				'team' => $team
		] );
	}

	public function getPlayersDetails($teamId,$player_id) {
        
        $playerindi = DB::table ( 'cricket_all_players' )->where('id',$player_id)->first();

		$players = DB::table ( 'cricket_player_history' )
		->leftJoin ( 'cricket_fixtures', 'cricket_fixtures.comp_id', '=', 'cricket_player_history.competition_id' )
		->select ('cricket_player_history.*', 'cricket_fixtures.comp_name as comp_name')
		->groupBy('cricket_player_history.competition_id')
		->where('player_id', $player_id)
		->get();

		return view ( "players-details", [ 
				"confirm",
				'players' => $players,
				'playerindi' => $playerindi
		] );
	}

	public function getPoints() {

		$points = DB::table ( 'cricket_points_table' )
		->join ( 'cricket_fixtures', 'cricket_fixtures.comp_id', '=', 'cricket_points_table.compitation_id' )
		->leftJoin ( 'cricket_teams', 'cricket_teams.id', '=', 'cricket_points_table.team_id' )
		->leftJoin ( 'cricket_team_pictures', 'cricket_team_pictures.team_id', '=', 'cricket_teams.id' )
		->orderBy ( 'cricket_points_table.Points', 'DESC' )
		->select ('cricket_points_table.*', 'cricket_fixtures.comp_name as comp_name', 'cricket_team_pictures.image as teamImage', 'cricket_teams.name as teamName')
		->groupBy('cricket_points_table.team_id')
		->get();
		return view ( "points", [ 
				"confirm",
				'points' => $points 
		] );
	}

	 public function fixtures() {

		$fixtures = DB::table ( 'cricket_fixtures' )
		->orderBy ( 'cricket_fixtures.id', 'asc' )
		->select ('cricket_fixtures.*')
		->paginate(10);
		/*echo '<pre>';
		print_r($fixtures);die;*/
		return view ( "fixtures", [ 
				"confirm",
				'fixtures' => $fixtures 
		] );
	}
}
