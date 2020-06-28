<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Http\ErrorCodes;
use App\Http\SuccessCodes;
use App\Http\CricketController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Exceptions\BadRequestException;
use Validator;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Illuminate\Support\Facades\Response;

class Cricket extends Model {
	protected $table = 'lq_milestone';
	protected $primarykey = 'lqm_id';
	
	use Notifiable;

    /**
	* @author Yadu -> Add Team 
	*/
	public static function addTeam($data){
		$data = Input::all ();
 	if(isset($_FILES['image']["name"]) && !empty($_FILES['image']["name"])){
		
		$image = Input::file ( 'image' );
		$img = time () . '.' . $image->getClientOriginalExtension ();

		$destinationPath = public_path ( 'frontpages/images/teams' );

		//$image->move ( '/home/farida/', $image->getClientOriginalName()) ;
		//Storage::disk('public')->put('filename', $img);

         


    	}else{
    		$img = "dummy_team.jpeg";
    	}
    		$img = "dummy_team.jpeg";
    		
			$teamId = DB::table ('cricket_teams')->insertGetId ( array (
				'SYMID' => isset($data['short_name'])?$data['short_name']:"",
				'name' => isset($data['name'])?$data['name']:"",
				'short_name' => isset($data ['short_name'])?$data ['short_name']:""
			) );
			$picture = DB::table ('cricket_team_pictures')->insertGetId ( array (
				'team_id' => $teamId,
				'image' => $img
			) );

			return 'Team Added Succesfully';
		}

	/**
	* @author Yadu -> Update Team 
	*/
	public function updateTeam($data){

		if(isset($_FILES['image']["name"]) && !empty($_FILES['image']["name"])){
		  
	    	if($_FILES['image']['tmp_name']!=''){
		       $image = Input::file ( 'image' );
		       $img = time () . '.' . $image->getClientOriginalExtension ();
		       $destinationPath = public_path ( 'frontpages/images/teams' );
		       $image->move ( $destinationPath, $img );

		       $filename = public_path () . 'frontpages/images/teams' . @$data['old_image'];
			   @unlink ( $filename );

    		}else{
    			$img = $data['old_image'];
    		}
    	}else{
    		$img = $data['old_image'];
    	}
    	
			$addOptions = DB::table ('cricket_teams')->where('id', $data['id'])->update ( array (
				'name' => isset($data['name'])?$data['name']:"",
				'short_name' => isset($data ['short_name'])?$data ['short_name']:""
			) );

			$addOptions = DB::table ('cricket_team_pictures')->where('team_id', $data['id'])->update ( array (
				'image' => $img
			) );

		return true;
		
	}

}
