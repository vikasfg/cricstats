<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Cricket;
use Illuminate\contracts\container\container;
use App\Http\ErrorCodes;
use App\Http\SuccessCodes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CricketController extends Controller {
	public function __construct() {
		// $this->middleware('auth');
	}

	public function addTeam() {
		$data = Input::all ();

		if (isset($data) && !empty($data)) {

		$rules = array (
				'name' => 'required',
				'short_name' => 'required',
				'image' => 'required|mimes:jpg,png,gif,jpeg,JPG,GIF,PNG,JPEG' 
		);
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
 			Session::flash('message', 'Fill All the required field.');
			return Redirect::to ( '/admin/add-team' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else { 
			

			$team = new Cricket ();
			$return = $team->addTeam ($data);
			return $return;
			if ($return) {
				return Redirect::to ( '/admin/list-team' )->with ( "confirm", "You have successfully Added the Team! " );
			}
		}
	}else{
			return view ( '/admin/add-team', [ "confirm"]);
		}
	}


	public function updateTeam($id) {
		$data = Input::all ();

		if (isset($data) && !empty($data)) {
			$game = new Cricket();
			$game->updateTeam($data);
			$response = Redirect::to ( '/admin/update-team/'.$id)->with ( "confirm", "Team updated Successfully." );
			return $response;
		}else{
			$team = DB::table ( 'cricket_teams' )
			->where ( 'cricket_teams.id', $id)
		->join ( 'cricket_team_pictures', 'cricket_team_pictures.team_id', '=', 'cricket_teams.id' )
		->select('cricket_teams.*', 'cricket_team_pictures.image')
		->first ();

			return view ( '/admin/update-team', [ "confirm", 'team' => $team]);
		}
	} 

	public function listTeam() {
 
		$teams = DB::table ( 'cricket_teams' )
		->join ( 'cricket_team_pictures', 'cricket_team_pictures.team_id', '=', 'cricket_teams.id' )
		->select('cricket_teams.*', 'cricket_team_pictures.image')
		->paginate (10);

		return view ( "/admin/list-team", [ 
				"confirm",
				'teams' => $teams
		] );
	}

	public function delete_team(Request $request) {
		$id = $request->id;
		$data = DB::table ( 'cricket_teams' )->where ( 'id', $id )->delete ();
           if($data){
         	echo 1;
           }else{
            echo 0;
           }
          exit;
	}



}
