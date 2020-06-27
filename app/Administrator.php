<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Http\ErrorCodes;
use App\Http\SuccessCodes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Exceptions\BadRequestException;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Libraries\S3;
use Redirect;
use Illuminate\Support\Facades\Redis;

// use Yadakhov\InsertOnDuplicateKey;
class Administrator extends Model {
	protected $table = '';
	protected $primarykey = '';
	
	use Notifiable;


    

	/**
	 *
	 * @author Yadu -> Add 
	 */
	public static function updatehighlights() {
		$data = Input::all ();
		
		if (Input::get ( 'status' ) == 1) {
			$status_id = 1;
		} else {
			$status_id = 1;
		}
		
		$article_id = Input::get ( 'article_id' );
		$url = "https://api.dbnewshub.com/api/v1/news-container-listng?_format=json&storyid=" . $article_id;
		$curlData = self::curl_function ( $url );
		
		if (isset ( $curlData->data )) {
			$article_cat_id = $curlData->data->newsListing [0]->category [0]->id;
			$article_share_url = $curlData->data->newsListing [0]->shareUrl [0]->url;
		} else {
			$article_cat_id = null;
			$article_share_url = null;
		}
		
		if (isset ( $_FILES ['photo'] ['name'] ) && (! empty ( $_FILES ['photo'] ['name'] ))) {
			$bucket = "dbtambola";
			if (! defined ( 'awsAccessKey' ))
				define ( 'awsAccessKey', 'AKIAIP2YC244VVZQDXVQ' );
			if (! defined ( 'awsSecretKey' ))
				define ( 'awsSecretKey', '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' );
			$s3 = new S3 ( awsAccessKey, awsSecretKey );
			$s3->putBucket ( $bucket, S3::ACL_PUBLIC_READ );
			
			$name1 = $_FILES ['photo'] ['name'];
			$size = $_FILES ['photo'] ['size'];
			$tmp = $_FILES ['photo'] ['tmp_name'];
			$ext = pathinfo ( $_FILES ["photo"] ["name"], PATHINFO_EXTENSION );
			
			$actual_image_name = "budget/" . time () . "." . $ext;
			$s3->putObjectFile ( $tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ );
			$s3url = 'https://d20z4zz73kkpb4.cloudfront.net/'. $actual_image_name;
		} else {
			
			$highlightImage = DB::table ( 'budget_highlights' )->orderBy ( 'id', 'desc' )->first ();
			
			if (isset ( $highlightImage )) {
				$s3url = $highlightImage->image;
			} else {
				$s3url = null;
			}
		}
		
		// echo '<pre>';
		// print_r(Input::all());die;
		$data = DB::table ( 'budget_highlights' )->where ( 'id', Input::get ( 'id' ) )->update ( [ 
				'slug' => Input::get ( 'slug' ),
				'highlite_title' => Input::get ( 'highlite_title' ),
				'article_id' => $article_id,
				'article_share_url' => $article_share_url,
				'article_cat_id' => $article_cat_id,
				'headline' => Input::get ( 'headline' ),
				'content' => Input::get ( 'content' ),
				'status_id' => $status_id,
				'image' => $s3url 
		]
		// 'updated_at'=> date("Y-m-d H:i:s")
		 );
		
		if ($data) {
			return true;
		} else {
			return false;
		}
	}
	public static function saveLoksabhaTicker($request) {
		// print_r($request->all()); die;
		if(isset($request ['title'])){
		$count = count ( $request ['title'] );

		DB::table ( 'ls_master_settings' )->where ( 'key', 'TICKERS' )->update ( array (
				'status_id' => isset($request ['result_status'])?$request ['result_status']:2 
		) );
		
		if ($count >= 1) {
			for($i = 0; $i < $count; $i ++) {
				
				if (isset ( $request ['id'] [$i] )) {

				if(isset($request['node_id'][$i])){
					$url = "https://api.dbnewshub.com/api/v1/news-container-listng?_format=json&storyid=".$request['node_id'][$i];
					$containerDetail = self::curl_function($url);
					$node_id = $containerDetail->data->newsListing[0]->id;
					$content_type = $containerDetail->data->newsListing[0]->contentType;
					$category_id = $containerDetail->data->newsListing[0]->shareUrl[0]->catId;
					$share_url = $containerDetail->data->newsListing[0]->shareUrl[0]->url;
				}else{
					$node_id = null;
					$content_type = "";
					$category_id ="";
					$share_url = "";
				}
					$sastaMehengaData = DB::table ( 'ls_tickers' )->where ( 'id', $request ['id'] [$i] )->update ( array (
							'title' => $request ['title'] [$i],
							'order' => $request ['order'] [$i],
							'status_id' => $request ['status_id'] [$i],
							'node_id' => isset($node_id)?$node_id:null,
							'category_id' => intval($category_id),
							'share_url' => $share_url,
							'content_type' => $content_type
					) );
				} else {

				if(isset($request['node_id'][$i])){
				$url = "https://api.dbnewshub.com/api/v1/news-container-listng?_format=json&storyid=".$request['node_id'][$i];
				$containerDetail = self::curl_function($url);
				$node_id = $containerDetail->data->newsListing[0]->id;
				$content_type = $containerDetail->data->newsListing[0]->contentType;
				$category_id = $containerDetail->data->newsListing[0]->shareUrl[0]->catId;
				$share_url = $containerDetail->data->newsListing[0]->shareUrl[0]->url;
			}else{
				$node_id = null;
				$content_type = "";
				$category_id ="";
				$share_url = "";
			}
					$sastaMehengaData = DB::table ( 'ls_tickers' )->insert ( array (
							'title' => $request ['title'] [$i],
							'order' => $request ['order'] [$i],
							'status_id' => $request ['status_id'] [$i],
							'node_id' => isset($node_id)?$node_id:null,
							'category_id' => intval($category_id),
							'share_url' => $share_url,
							'content_type' => $content_type 
					) );
				}
			}
			return true;
		}} else {
			return false;
		}
	}
	public static function addLoksabhaResultsData($request) {
		self::addUpdateAllianceResult ( $request );
		self::addUpdateAlliancePartyResult ( $request );
		self::addUpdateFooterMessage ( $request );



		$isRedisCheck = self::isredisconnect();
		if($isRedisCheck){
			
			Redis::del('topTallyList_'.$request ['state_id'].'_'.config ( 'constants.ELECTION_YEAR' ));
		    Redis::del('allFooterBullets_');
		    Redis::del('footerBullets_'.$request ['state_id'].'_'.config ( 'constants.ELECTION_YEAR' ).'_'.$request ['key']);
		    Redis::del('allSettings_');
		    
		    self::urlPurging ( 'https://node.dbnewshub.com/loksabha-api/result?sid="'.$request ['state_id'].'"&year="'.config ( 'constants.ELECTION_YEAR' ).'"' );
		    self::urlPurging ( 'https://node.dbnewshub.com/loksabha-api/result/bullets?sid="'.$request ['state_id'].'"&year="'.config ( 'constants.ELECTION_YEAR' ).'"&key="'.config ( 'constants.RESULTS_2019' ).'"');

		}
		
		$updateResultTitle = DB::table ( 'ls_master_settings' )->where ( 'key', $request ['key'] )->update ( array (
				'value' => $request ['title'],
				'status_id' => isset($request ['result_status'])?$request ['result_status']:2 
		) ); 
		
		return true;
	}
	public static function addUpdateAllianceResult($request) {

		$countAlliance = count ( $request ['id'] );
		if ($countAlliance > 0) {
			for($i = 0; $i < $countAlliance; $i ++) {
				if (isset ( $request ['all_pk_id'] [$i] )) {
					$sastaMehengaData = DB::table ( 'ls_result_alliance' )->where ( 'id', $request ['all_pk_id'] [$i] )->update ( array (
							'alliance_id' => isset($request ['id'] [$i])?$request ['id'] [$i]:0,
							'state_id' => isset($request ['state_id'])?$request ['state_id']:0,
							'aage' => isset($request ['all_aage'] [$i])?$request ['all_aage'] [$i]:0,
							'jeete' => isset($request ['all_jeete'] [$i])?$request ['all_jeete'] [$i]:0,
							'kul_seat' => isset($request ['all_kul_seat'] [$i])?$request ['all_kul_seat'] [$i]:0,
							'kul_seat_2014' => isset($request ['all_kul_seat_2014'] [$i])?$request ['all_kul_seat_2014'] [$i]:0,
							'vote_percentage' => isset($request ['all_vote_percentage'] [$i])?$request ['all_vote_percentage'] [$i]:0,
							'priority' => $request ['all_order'] [$i],
							'election_year' => config ( 'constants.ELECTION_YEAR' ),
							'status_id' => 1 
					) );
				} else {
					$allianceResult = DB::table ( 'ls_result_alliance' )->insert ( array (
							'alliance_id' => isset($request ['id'] [$i])?$request ['id'] [$i]:0,
							'state_id' => isset($request ['state_id'])?$request ['state_id']:0,
							'aage' => isset($request ['all_aage'] [$i])?$request ['all_aage'] [$i]:0,
							'jeete' => isset($request ['all_jeete'] [$i])?$request ['all_jeete'] [$i]:0,
							'kul_seat' => isset($request ['all_kul_seat'] [$i])?$request ['all_kul_seat'] [$i]:0,
							'kul_seat_2014' => isset($request ['all_kul_seat_2014'] [$i])?$request ['all_kul_seat_2014'] [$i]:0,
							'vote_percentage' => isset($request ['all_vote_percentage'] [$i])?$request ['all_vote_percentage'] [$i]:0,
							'priority' => $request ['all_order'] [$i],
							'election_year' => config ( 'constants.ELECTION_YEAR' ),
							'status_id' => 1 
					) );
				}
			}
		}
		return true;
	}
	public static function addUpdateAlliancePartyResult($request) {
		$countAllianceParty = count ( $request ['party_id'] );
		if ($countAllianceParty > 0) {
			for($i = 0; $i < $countAllianceParty; $i ++) {
				if (isset ( $request ['pk_id'] [$i] )) {
					$sastaMehengaData = DB::table ( 'ls_result_alliance_party' )->where ( 'id', $request ['pk_id'] [$i] )->update ( array (
							'alliance_id' => isset($request ['alliance_id'] [$i])?$request ['alliance_id'] [$i]:0,
							'state_id' => isset($request ['state_id'])?$request ['state_id']:0,
							'party_id' => isset($request ['party_id'] [$i])?$request ['party_id'] [$i]:0,
							'aage' => isset($request ['aage'] [$i])?$request ['aage'] [$i]:0,
							'jeete' => isset($request ['jeete'] [$i])?$request ['jeete'] [$i]:0,
							'kul_seat' => isset($request ['kul_seat'] [$i])?$request ['kul_seat'] [$i]:0,
							'kul_seat_2014' => isset($request ['kul_seat_2014'] [$i])?$request ['kul_seat_2014'] [$i]:0,
							'vote_percentage' => isset($request ['vote_percentage'] [$i])?$request ['vote_percentage'] [$i]:0,
							'priority' => $request ['order'] [$i],
							'election_year' => config ( 'constants.ELECTION_YEAR' ),
							'status_id' => $request ['status_id'] [$i] 
					) );
				} else {
					$alliancePartyResult = DB::table ( 'ls_result_alliance_party' )->insert ( array (
							'alliance_id' => isset($request ['alliance_id'] [$i])?$request ['alliance_id'] [$i]:0,
							'state_id' => isset($request ['state_id'])?$request ['state_id']:0,
							'party_id' => isset($request ['party_id'] [$i])?$request ['party_id'] [$i]:0,
							'aage' => isset($request ['aage'] [$i])?$request ['aage'] [$i]:0,
							'jeete' => isset($request ['jeete'] [$i])?$request ['jeete'] [$i]:0,
							'kul_seat' => isset($request ['kul_seat'] [$i])?$request ['kul_seat'] [$i]:0,
							'kul_seat_2014' => isset($request ['kul_seat_2014'] [$i])?$request ['kul_seat_2014'] [$i]:0,
							'vote_percentage' => isset($request ['vote_percentage'] [$i])?$request ['vote_percentage'] [$i]:0,
							'priority' => $request ['order'] [$i],
							'election_year' => config ( 'constants.ELECTION_YEAR' ),
							'status_id' => $request ['status_id'] [$i] 
					) );
				}
			}
		}
		return true;
	}
	public static function checkFooterMessage($stateId, $regionId, $key) {
		$footerMessage = \DB::table ( 'ls_footer_bullets' )->where ( 'key_name', $key );
		if ($stateId) {
			$footerMessage->where ( 'state_id', $stateId );
		}
		if ($regionId) {
			$footerMessage->where ( 'region_id', $regionId );
		}
		$footerMessage = $footerMessage->first ();
		return $footerMessage;
	}
	public static function addUpdateFooterMessage($request) {

		if(isset($request ['footer_status'])){
			$footer_status = $request ['footer_status'];
		}else{
			$footer_status = 2;
		}
		
		$footerMessage = self::checkFooterMessage ( $request ['state_id'], $request ['region_id'], $request ['key'] );
		if (isset ( $footerMessage )) {
			$footerBullets = DB::table ( 'ls_footer_bullets' );
			$footerBullets->where ( 'key_name', $request ['key'] );
			if ($request ['state_id']) {
				$footerBullets->where ( 'state_id', $request ['state_id'] );
			}
			if ($request ['region_id']) {
				$footerBullets->where ( 'region_id', $request ['region_id'] );
			}
			$footerBullets->update ( array (
					'status_id' =>$footer_status,
					'message' => $request ['message'] 
			) );
		} else {
			$footerBullets = DB::table ( 'ls_footer_bullets' )->insert ( array (
					'key_name' => $request ['key'],
					'state_id' => $request ['state_id'],
					'region_id' => $request ['region_id'],
					'election_year' => config ( 'constants.ELECTION_YEAR' ),
					'status_id' => $footer_status,
					'message' => $request ['message'] 
			) );
		}
		return true;
	}
	public static function curl_function($url) {
		// curl start for get kahaniya news from dbnewshub
		try {
			$mobileHeader = null;
			
			$dtyp_t = isset ( $mobileHeader ['Device-Type'] ) ? $mobileHeader ['Device-Type'] : (isset ( $mobileHeader ['device-type'] ) ? $mobileHeader ['device-type'] : "");
			$dbid_t = isset ( $mobileHeader ['DB-Id'] ) ? $mobileHeader ['DB-Id'] : (isset ( $mobileHeader ['db-id'] ) ? $mobileHeader ['db-id'] : "");
			$auth_t = isset ( $mobileHeader ['Authorization'] ) ? $mobileHeader ['Authorization'] : (isset ( $mobileHeader ['authorization'] ) ? $mobileHeader ['authorization'] : "");
			$csrf_t = isset ( $mobileHeader ['X-CSRF-Token'] ) ? $mobileHeader ['X-CSRF-Token'] : (isset ( $mobileHeader ['x-csrf-token'] ) ? $mobileHeader ['x-csrf-token'] : "");
			
			$username = 'api.access';
			$password = 'MT2bTtI6wSRQ';
			
			$mobileHeader ['X-CSRF-Token'] = "";
			$chCallHeaders [] = "Content-Type: application/json;charset=utf-8";
			$chCallHeaders [] = "Device-Type:ANDROID";
			$chCallHeaders [] = "DB-Id:422582725";
			$chCallHeaders [] = "Authorization:" . $auth_t;
			$chCallHeaders [] = "X-CSRF-Token:" . $csrf_t;
			
			$ch = curl_init ();
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_HTTPGET, true );
			curl_setopt ( $ch, CURLOPT_TIMEOUT, 100 );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt ( $ch, CURLOPT_USERPWD, "$username:$password" );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, $chCallHeaders );
			
			$res = curl_exec ( $ch );
			$log = json_decode ( $res );
			// print_r($log->data->newsListing); die;
			curl_close ( $ch );
			return $log;
		} catch ( Exception $ex ) {
		}
	}
	public static function enableDisableBudgetSetting() {
		$status_id1 = Input::get ( 'status_id1' );
		$status_id2 = Input::get ( 'status_id2' );
		$status_id3 = Input::get ( 'status_id3' );
		$status_id4 = Input::get ( 'status_id4' );
		$status_id5 = Input::get ( 'status_id5' );
		$status_id6 = Input::get ( 'status_id6' );
		$status_id7 = Input::get ( 'status_id7' );
		
		if (isset ( $status_id1 ) == 1) {
			$status_id1 = 1;
		} else {
			$status_id1 = 0;
		}
		if (isset ( $status_id2 ) == 1) {
			$status_id2 = 1;
		} else {
			$status_id2 = 0;
		}
		if (isset ( $status_id3 ) == 1) {
			$status_id3 = 1;
		} else {
			$status_id3 = 0;
		}
		if (isset ( $status_id4 ) == 1) {
			$status_id4 = 1;
		} else {
			$status_id4 = 0;
		}
		if (isset ( $status_id5 ) == 1) {
			$status_id5 = 1;
		} else {
			$status_id5 = 0;
		}
		if (isset ( $status_id6 ) == 1) {
			$status_id6 = 1;
		} else {
			$status_id6 = 0;
		}
		if (isset ( $status_id7 ) == 1) {
			$status_id7 = 1;
		} else {
			$status_id7 = 0;
		}
		
		$data = self::where ( 'id', 1 )->update ( [ 
				'status_id' => $status_id1,
				'updated_at' => date ( "Y-m-d H:i:s" ) 
		] );
		$data = self::where ( 'id', 2 )->update ( [ 
				'status_id' => $status_id2,
				'updated_at' => date ( "Y-m-d H:i:s" ) 
		] );
		$data = self::where ( 'id', 3 )->update ( [ 
				'status_id' => $status_id3,
				'updated_at' => date ( "Y-m-d H:i:s" ) 
		] );
		$data = self::where ( 'id', 4 )->update ( [ 
				'status_id' => $status_id4,
				'updated_at' => date ( "Y-m-d H:i:s" ) 
		] );
		$data = self::where ( 'id', 5 )->update ( [ 
				'status_id' => $status_id5,
				'updated_at' => date ( "Y-m-d H:i:s" ) 
		] );
		$data = self::where ( 'id', 6 )->update ( [ 
				'status_id' => $status_id6,
				'updated_at' => date ( "Y-m-d H:i:s" ) 
		] );
		$data = self::where ( 'id', 7 )->update ( [ 
				'status_id' => $status_id7,
				'updated_at' => date ( "Y-m-d H:i:s" ) 
		] );
		
		return true;
	}
	public static function sendBudgetDataToNoida($table, $data) {
		$data = array (
				"success" => true,
				"result" => $data,
				"msg" => $table,
				"json_type" => $table 
		);
		
		$data_string = json_encode ( $data );
		
		// $username = 'api.access';
		// $password = 'MT2bTtI6wSRQ';
		$ch = curl_init ( 'https://cldaws.bhaskar.com/election/common_json_budget_2019.php' );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
		// curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data_string );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				'Content-Type: application/json',
				'Accept:application/json',
				'Authorization:Basic c2F0eWE6c2F0eWEkJV4=',
				'Content-Length: ' . strlen ( $data_string ) 
		) );
		
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		$userResult = json_decode ( $result );
		return true;
	}
	public static function addLoksabhaResultsCastData($request) {
		// echo '<pre>'; print_r($request ['title']); die;
		self::addUpdateCasteResult ( $request );
		self::addUpdateFooterMessage ( $request );

		$isRedisCheck = self::isredisconnect();
		if($isRedisCheck){
			Redis::del('casteTallyList_'.$request ['state_id'].'_'.config ( 'constants.ELECTION_YEAR' ));
		    Redis::del('allFooterBullets_');
		    Redis::del('footerBullets_'.$request ['state_id'].'_'.config ( 'constants.ELECTION_YEAR' ).'_'.$request ['key']);
		    Redis::del('allSettings_');

		     self::urlPurging ( 'https://node.dbnewshub.com/loksabha-api/result/caste?sid="'.$request ['state_id'].'"&year="'.config ( 'constants.ELECTION_YEAR' ).'"' );
		    self::urlPurging ( 'https://node.dbnewshub.com/loksabha-api/result/bullets?sid="'.$request ['state_id'].'"&year="'.config ( 'constants.ELECTION_YEAR' ).'"&key="'.config ( 'constants.CAST_2019' ).'"');
		}


		$updateResultTitle = DB::table ( 'ls_master_settings' )->where ( 'key', $request ['key'] )->update ( array (
				'value' => $request ['title'],
				'status_id' => isset($request ['status_for_master'])?$request ['status_for_master']:2 
		) );
		
		return true;
	}
	public static function addUpdateCasteResult($request) {
		if(isset($request ['alliance_name'])){
		$countCaste = count ( $request ['alliance_name'] );
		if ($countCaste > 0) {
			for($i = 0; $i < $countCaste; $i ++) {
				if (isset ( $request ['id'] [$i] )) {
					$updateCasteResult = DB::table ( 'ls_result_cast' )->where ( 'id', $request ['id'] [$i] )->update ( array (
							'alliance_name' => $request ['alliance_name'] [$i],
							'sc' => $request ['sc'] [$i],
							'st' => $request ['st'] [$i],
							'muslim' => $request ['muslim'] [$i],
							'priority' => $request ['priority'] [$i],
							'color_code_id' => $request ['color_code_id'] [$i],
							'state_id' => $request ['state_id'],
							'election_year' => config ( 'constants.ELECTION_YEAR' ),
							'status_id' => $request ['status_id'] [$i] 
					) );
				} else {
					$addasteResult = DB::table ( 'ls_result_cast' )->insert ( array (
							'alliance_name' => $request ['alliance_name'] [$i],
							'sc' => $request ['sc'] [$i],
							'st' => $request ['st'] [$i],
							'muslim' => $request ['muslim'] [$i],
							'priority' => $request ['priority'] [$i],
							'color_code_id' => $request ['color_code_id'] [$i],
							'state_id' => $request ['state_id'],
							'election_year' => config ( 'constants.ELECTION_YEAR' ),
							'status_id' => $request ['status_id'] [$i] 
					) );
				}
			}
		}}
		return true;
	}
	public static function addLoksabhaResultsRegionData($request) {
		self::addUpdateRegionResult ( $request );
		self::addUpdateFooterMessage ( $request );

		$isRedisCheck = self::isredisconnect();
		if($isRedisCheck){
			Redis::del('casteTallyList_'.$request ['state_id'].'_'.config ( 'constants.ELECTION_YEAR' ));
		    Redis::del('allFooterBullets_');
		    Redis::del('allSettings_');
		    
		     self::urlPurging ( 'https://node.dbnewshub.com/loksabha-api/result/region?rid="'.$request ['region_id'].'"&year="'.config ( 'constants.ELECTION_YEAR' ).'"' );
		}
		
		$updateResultTitle = DB::table ( 'ls_master_settings' )->where ( 'key', $request ['key'] )->update ( array (
				'value' => $request ['title'],
				'status_id' => isset($request ['status_for_master'])?$request ['status_for_master']:2
		) ); 
		
		return true;
	}
	public static function addUpdateRegionResult($request) {
		$countRegion = count ( $request ['alliance_name'] );
		if ($countRegion > 0) {
			for($i = 0; $i < $countRegion; $i ++) {
				if (isset ( $request ['id'] [$i] )) {
					$updateRegionResult = DB::table ( 'ls_result_region' )->where ( 'id', $request ['id'] [$i] )->update ( array (
							'alliance_name' => $request ['alliance_name'] [$i],
							'seat_count' => $request ['seat_count'] [$i],
							'vote_percentage' => $request ['vote_percentage'] [$i],
							'color_code_id' => $request ['color_code_id'] [$i],
							'priority' => $request ['priority'] [$i],
							'region_id' => $request ['region_id'],
							'election_year' => config ( 'constants.ELECTION_YEAR' ),
							'status_id' => $request ['status_id'] [$i] 
					) );
				} else {
					$addReasonResult = DB::table ( 'ls_result_region' )->insert ( array (
							'alliance_name' => $request ['alliance_name'] [$i],
							'seat_count' => $request ['seat_count'] [$i],
							'priority' => $request ['priority'] [$i],
							'vote_percentage' => $request ['vote_percentage'] [$i],
							'color_code_id' => $request ['color_code_id'] [$i],
							'region_id' => $request ['region_id'],
							'election_year' => config ( 'constants.ELECTION_YEAR' ),
							'status_id' => $request ['status_id'] [$i] 
					) );
				}
			}
		}
		return true;
	}
	public static function add_alliances($request) {
		$scount = isset($request ['all_name_hi'])?$request ['all_name_hi']:[];
		$countAlliance = count ( $scount );
		if ($countAlliance > 0) {
			for($i = 0; $i < $countAlliance; $i ++) {
				if (isset ( $request ['id'] [$i] )) {
					$updateAlliance = DB::table ( 'ls_alliances' )->where ( 'id', $request ['id'] [$i] )->update ( array (
							'all_name_hi' => $request ['all_name_hi'] [$i],
							'all_name_en' => $request ['all_name_en'] [$i],
							'priority' => $request ['priority'] [$i],
							'color_code_id' => $request ['color_code_id'] [$i],
							'status_id' => $request ['status_id'] [$i] 
					) );
				} else {
					$addAlliance = DB::table ( 'ls_alliances' )->insert ( array (
							'all_name_hi' => $request ['all_name_hi'] [$i],
							'all_name_en' => $request ['all_name_en'] [$i],
							'priority' => $request ['priority'] [$i],
							'color_code_id' => $request ['color_code_id'] [$i],
							'status_id' => $request ['status_id'] [$i],
							'election_year' => config ( 'constants.ELECTION_YEAR' ),
							'state_id' => $request ['state_id'] 
					) );
				}
			}
		}
		return true;
	}
	public static function add_alliance_party($request) {
		
		$scount = isset($request ['allid'])?$request ['allid']:[];
		$countAlliance = count ( $scount );
		if ($countAlliance > 0) {
			for($i = 0; $i < $countAlliance; $i ++) {

				
				
				if (isset ( $request ['id'] [$i] )) {

				if (isset ( $request ['party_symbol_url'] [$i] ) && ! empty ( $request ['party_symbol_url'] [$i] )) {
					$symbol_url = $request ['party_symbol_url'] [$i];
				} else {
					$query = \DB::table ( 'ls_parties' )->where ( 'id', $request ['id'] [$i] )->first ();
					$symbol_url = $query->party_symbol;
				}

					$updateAlliance = DB::table ( 'ls_parties' )->where ( 'id', $request ['id'] [$i] )->update ( array (
							'allid' => $request ['allid'] [$i],
							'party_nick_name' => $request ['party_nick_name'] [$i],
							'party_name_en' => $request ['party_name_en'] [$i],
							'party_name_hi' => $request ['party_name_hi'] [$i],
							'party_priority' => $request ['party_priority'] [$i],
							'party_name_hi' => $request ['party_name_hi'] [$i],
							'color_code_id' => $request ['color_code_id'] [$i],
							'status_id' => $request ['status_id'] [$i],
							'party_symbol' => isset($symbol_url)?$symbol_url:null,
							'election_year' => config ( 'constants.ELECTION_YEAR' ) 
					) );
				} else {
					$addAlliance = DB::table ( 'ls_parties' )->insert ( array (
							'allid' => $request ['allid'] [$i],
							'party_nick_name' => $request ['party_nick_name'] [$i],
							'party_name_en' => $request ['party_name_en'] [$i],
							'party_name_hi' => $request ['party_name_hi'] [$i],
							'party_priority' => $request ['party_priority'] [$i],
							'party_name_hi' => $request ['party_name_hi'] [$i],
							'color_code_id' => $request ['color_code_id'] [$i],
							'status_id' => $request ['status_id'] [$i],
							'election_year' => config ( 'constants.ELECTION_YEAR' ),
							'party_symbol' =>isset($symbol_url)?$symbol_url:null,
							'region_id' => $request ['region_id'],
							'state_id' => $request ['state_id'] 
					) );
				}
			}
		}
		return true;
	}
	
	public static function addAllPhasesData($request){
		self::addUpdatePhaseTitleData ( $request );
		self::addUpdatePhaseData ( $request );
		return true;
	}
	
	public static function addUpdatePhaseTitleData($request){
		if(isset($request ['footer_status'])){
			$footer_status = $request ['footer_status'];
		}else{
			$footer_status = 2;
		}
		if (isset ( $request ['ls_election_phase_state_details_id']) && 
				!empty($request ['ls_election_phase_state_details_id'])) {
			$updatePhaseTitleData = DB::table ( 'ls_election_phase_state_details' )
				->where ( 'id', $request ['ls_election_phase_state_details_id'] )->update ( array (
					'state_id' => $request ['state_id'],
					'state_title' => $request ['state_title'],
					'total_matdata' => $request ['total_matdata'],
					'total_purush' => $request ['total_purush'],
					'total_mahila' => $request ['total_mahila'],
					'total_third_gender' => $request ['total_third_gender'],
					'footer_message' => $request ['footer_message'],
					'footer_status' => $footer_status
			) );
		} else {
			$addPhaseTitleData = DB::table ( 'ls_election_phase_state_details' )->insert ( array (
					'state_id' => $request ['state_id'],
					'state_title' => $request ['state_title'],
					'total_matdata' => $request ['total_matdata'],
					'total_purush' => $request ['total_purush'],
					'total_mahila' => $request ['total_mahila'],
					'total_third_gender' => $request ['total_third_gender'],
					'footer_message' => $request ['footer_message'],
					'footer_status' => $footer_status
			) );
		}
		return true;
	}
	
	public static function addUpdatePhaseData($request){
		$phaseCount = count ( $request ['phase_name'] );
		if ($phaseCount > 0) {
			for($i = 0; $i < $phaseCount; $i ++) {
				if (isset ( $request ['ls_election_phases_id'] [$i] )) {
					
					$updateElectionPhases = DB::table ( 'ls_election_phases' )
					->where ( 'id', $request ['ls_election_phases_id'] [$i] )
					->update ( array (
							'state_id' => $request ['state_id'],
							'phase_name' => $request ['phase_name'] [$i],
							'election_date' => $request ['election_date'] [$i],
							'total_seat' => $request ['total_seat'] [$i],
							'adhisuchna' => $request ['adhisuchna'] [$i],
							'namankan_last_date' => $request ['namankan_last_date'] [$i],
							'scootny' => $request ['scootny'] [$i],
							'name_return_last_date' => $request ['name_return_last_date'] [$i],
							'status_id' => $request ['status_id'] [$i]
					) );	
					
					/*  Loop for state n city */
					if ($request['state_id'] == 37){
						DB::table ( 'ls_election_phase_states' )->where ( 'phase_id', 
								$request ['ls_election_phases_id'] [$i] )->delete ();
					}else{
						DB::table ( 'ls_election_phase_cities' )->where ( 'phase_id', 
								$request ['ls_election_phases_id'] [$i] )->delete ();
					}
					if (isset($request['place_id_'.$i])){
						for ($j=0; $j < count($request['place_id_'.$i]) ; $j++) {
							if ($request['state_id'] == 37){
								$addStateElectionPhases = DB::table ( 'ls_election_phase_states' )->insert(
										array ('state_id' => $request['place_id_'.$i][$j],
												'phase_id' => $request ['ls_election_phases_id'] [$i])	);
							}else{
								$addCityElectionPhases = DB::table ( 'ls_election_phase_cities' )->insert(
										array ('city_id' => $request['place_id_'.$i][$j],
												'phase_id' => $request ['ls_election_phases_id'] [$i]));
							}
						}
					}
				} else {
					$addElectionPhases = DB::table ( 'ls_election_phases' )->insertGetId ( array (
							'state_id' => $request ['state_id'],
							'phase_name' => $request ['phase_name'] [$i],
							'election_date' => $request ['election_date'] [$i],
							'total_seat' => $request ['total_seat'] [$i],
							'adhisuchna' => $request ['adhisuchna'] [$i],
							'namankan_last_date' => $request ['namankan_last_date'] [$i],
							'scootny' => $request ['scootny'] [$i],
							'name_return_last_date' => $request ['name_return_last_date'] [$i],
							'status_id' => $request ['status_id'] [$i]
					) );
					
					/*  Loop for state n city */
					if (isset($request['place_id_'.$i])){
						for ($j=0; $j < count($request['place_id_'.$i]) ; $j++) { 
							if ($request['state_id'] == 37){
								$addStateElectionPhases = DB::table ( 'ls_election_phase_states' )->insert(
								array ('state_id' => $request['place_id_'.$i][$j],
								'phase_id' => $addElectionPhases)	);
							}else{
								$addCityElectionPhases = DB::table ( 'ls_election_phase_cities' )->insert(
									array ('city_id' => $request['place_id_'.$i][$j],
									'phase_id' => $addElectionPhases));
							}
						}
					}
				}
			}
		}
		return true;
	}

	public static function addmanage_vidhan_sabha($request) {
		self::addUpdateManage_vidhan_sabha ( $request );
		self::addUpdateFooterMessage_loksabha ( $request );
		
		$updateResultTitle = DB::table ( 'ls_master_settings' )->where ( 'key', $request ['key'] )->update ( array (
				'value' => $request ['title'],
				'status_id' => isset($request ['status_for_master'])?$request ['status_for_master']:2 
		) );

		
		
		return true;
	}

	public static function addUpdateManage_vidhan_sabha($request) {
		if(isset($request ['party_name'])){
		$countParty = count ( $request ['party_name'] );
		if ($countParty > 0) {
			for($i = 0; $i < $countParty; $i ++) {
				if (isset ( $request ['id'] [$i] )) {
					$updateRegionResult = DB::table ( 'ls_vs_party_result' )->where ( 'id', $request ['id'] [$i] )->update ( array (
							'state_id' => $request ['state_id'],
							'party_name' => $request ['party_name'] [$i],
							'aage' => $request ['aage'] [$i],
							'jeete' => $request ['jeete'] [$i],
							'kul' => $request ['kul'] [$i],
							'priority' => $request ['priority'] [$i],
							'vote_percentage' => $request ['vote_percentage'] [$i],
							'kul_2014' => $request ['kul_2014'] [$i],
							'status_id' => $request ['status_id'] [$i] 
					) );
				} else {
					$addReasonResult = DB::table ( 'ls_vs_party_result' )->insert ( array (
							'state_id' => $request ['state_id'],
							'party_name' => $request ['party_name'] [$i],
							'aage' => $request ['aage'] [$i],
							'jeete' => $request ['jeete'] [$i],
							'kul' => $request ['kul'] [$i],
							'priority' => $request ['priority'] [$i],
							'vote_percentage' => $request ['vote_percentage'] [$i],
							'kul_2014' => $request ['kul_2014'] [$i],
							'status_id' => $request ['status_id'] [$i]
					) );
				}
			}
		}
		return true;
	}else{
		return true;
	}
}

	public static function get_message_footer_for_vidhansabha($key) {
		$footerMessage = \DB::table ( 'ls_footer_bullets' )->where ( 'key_name', $key );
		$footerMessage = $footerMessage->first ();
		return $footerMessage;
	}

	public static function addUpdateFooterMessage_loksabha($request) {
		if(isset($request ['footer_status'])){
			$footer_status = $request ['footer_status'];
		}else{
			$footer_status = 2;
		}
		$footerMessage = self::get_message_footer_for_vidhansabha ($request ['key'] );
		if (isset ( $footerMessage )) {
			$footerBullets = DB::table ( 'ls_footer_bullets' );

			if ($request ['key']) {
				$footerBullets->where ( 'key_name', "VIDHAN_SABHA");
			}
			
			$footerBullets->update ( array (
					'status_id' => $footer_status,
					'message' => $request ['message'],
					'election_year' => 2019 
			) );
		} else {
			$footerBullets = DB::table ( 'ls_footer_bullets' )->insert ( array (
					'key_name' => $request ['key'],
					'status_id' => $footer_status,
					'message' => $request ['message'],
					'election_year' => 2019 
			) );
		}
		return true;
	}

	public static function isredisconnect(){
		$redisConnected = false;
				try{
					$redis = Redis::connection();
		            $redis->ping();
		            $redisConnected = true;
		        } catch (Exception $e){
		            $e->getMessage();
		            $redisConnected = false;
		        }
		        if($redisConnected)
		        {
		        	return true;
		        }else{
		        	return false;
		        }
			}

	public static function sendLoksabhaDataToNoida($table, $data, $data1 = false, $msg) {

		if($table == 'ls_social'){
			$datas = array (
				"success" => true,
				"result" => base64_encode($data),
				"result2" => $data1,
				"msg" => $msg,
				"json_type" => $table
		);
		}else{
			$datas = array (
				"success" => true,
				"result" => $data,
				"result2" => $data1,
				"msg" => $msg,
				"json_type" => $table
			);
		}

		$data_string = json_encode($datas);

		//print_r($data_string);die;
		$ch = curl_init ( 'https://cldaws.bhaskar.com/election/common_json_election_staging_2019.php.php' );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
		// curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data_string );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				'Content-Type: application/json',
				'Accept:application/json',
				'Authorization:Basic c2F0eWE6c2F0eWEkJV4=',
				'Content-Length: ' . strlen ( $data_string ) 
		) );
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		$userResult = json_decode ( $result );
		//print_r($userResult);die;
		return true;
	}

	/* container url purging */
	public static function urlPurging($url) {
		$data = '{"urls":"' . $url . '"}';
		
		$username = 'api.access';
		$password = 'MT2bTtI6wSRQ';
		
		$ch = curl_init ( 'https://appfeedlight.bhaskar.com/webfeed/purge-urls/' );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_USERPWD, "$username:$password" );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				'Content-Type: application/json',
				'Content-Length: ' . strlen ( $data ) 
		) );
		$result = curl_exec ( $ch );
		try {
			$userResult = json_decode ( $result );
			curl_close ( $ch );
			return true;
		} catch ( Exception $ex ) {
		}
	}

}
