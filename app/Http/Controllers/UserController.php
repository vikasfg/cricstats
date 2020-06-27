<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use \App\User;
use App\Http\ErrorCodes;
use App\Http\SuccessCodes;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class UserController extends Controller {

	public function getUsers() {
		$response = User::getAllUsers ();
		if (! $response) {
			return [ 
					"code" => 400,
					"message" => "No record found" 
			];
		} else {
			return [ 
					"code" => 200,
					"message" => "success",
					"data" => $response 
			];
		}
	}
	public function createUser(Request $request) {
		$device_id = $request->headers->get ( 'device-id' );
		$checkUserOtp = \DB::table ( 'save_user_otp' )->where ( 'device_id', $device_id )->select ( 'id' )->first ();
		$checkUserOtp = true;
		if (! isset ( $checkUserOtp )) {
			return [ 
					"code" => 400,
					"message" => "Mobile number is not verified." 
			];
		}
		$response = User::createUser ( $request );
		if (isset ( $response )) {
			return $response;
		} else {
			$response = [ 
					"code" => 400,
					"message" => "Some Error Occured" 
			];
		}
		
		return $response;
	}
	public function getUserDetail(Request $request) {
		$device_id = $request->headers->get ( 'device-id' );
		
		$data = User::where ( 'device_id', $device_id )->select ( '*' )->first ();
		if (isset ( $data )) {
			return [ 
					"code" => 200,
					"message" => "success",
					"data" => $data 
			];
		} else {
			return [ 
					"code" => 400,
					"message" => "Data not found" 
			];
		}
	}
	public function updateUserDetail(Request $request) {
		$device_id = $request->headers->get ( 'device-id' );
		if ($device_id) {
			
			$checkUsermob = \DB::table ( 'users' )->where ( 'device_id', $device_id )->where ( 'mobile_no', $request ['mobile_no'] )->select ( 'id' )->first ();
			
			if (! isset ( $checkUsermob )) {
				
				$checkUserOtp = \DB::table ( 'save_user_otp' )->where ( 'device_id', $device_id )->where ( 'otp', $request ['otp'] )->select ( 'id' )->first ();
				if (! isset ( $checkUserOtp )) {
					return [ 
							"code" => 400,
							"message" => "Mobile number is not verified." 
					];
				}
			}
			
			$userDetail = User::updateUserDetail ( $request, $device_id );
			if ($userDetail) {
				return [ 
						"code" => 200,
						"message" => "User Profile Updated Successfully" 
				];
			} else {
				return [ 
						"code" => 400,
						"message" => "Some Error Occured" 
				];
			}
		} else {
			return [ 
					"code" => 400,
					"message" => "DeviceID not found" 
			];
		}
	}
	public function smsotp_post(Request $request) {
		$response = User::smsotp_post ( $request );
		if (! $response) {
			return [ 
					"code" => 400,
					"message" => "No record found" 
			];
		} else {
			return $response;
		}
	}
	
	/**
	 *
	 * @author Astha -- save attempt question answer
	 */
	public function saveTodaysQuestionAnswer(Request $request) {
		$response = User::saveTodaysQuestionAnswer ( $request );
		if (! $response) {
			return [ 
					"code" => 400,
					"message" => "Someting went wrong" 
			];
		} else {
			return $response;
		}
	}
	
	/**
	 *
	 * @author Astha -- check is user registered
	 */
	public function checkIsUserRegistered(Request $request) {
		$response = User::checkIsUserRegistered ( $request );
		if (! $response) {
			return [ 
					"code" => 400,
					"message" => "Someting went wrong" 
			];
		} else {
			return $response;
		}
	}
	
	/**
	 *
	 * @author Astha -- upload user image
	 */
	public function userProfilePicUpload(Request $request) {
		try {
			$response = User::uploadImage ( $request );
			return $response;
		} catch ( \Exception $e ) {
			throw $e;
		}
		return $response;
	}

public function getUsersprofileDetail($device_id) {
	
	if($device_id){
		$userProfile = DB::table ( 'users' )->where ( 'device_id', $device_id )->first ();
		if($userProfile){
		return json_encode($userProfile);
	}else{
		return "No Data Found";
	}
	}else{
		return "Please add device id in request param.";
	}
	}

	public function getUsersprofileGuestDetail($device_id) {
		//$device_id = Input::get("device_id");

		if($device_id){
			$userProfile = DB::table ( 'darwin_unique_dbid_1' )->where ( 'uniqueDeviceId', $device_id )->first ();
			if($userProfile){
			return json_encode($userProfile);
		}else{
			return "No Data Found";
		}
		}else{
			return "Please add device id in request param.";
		}
	}
	
}
