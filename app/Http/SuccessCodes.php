<?php

namespace App\Http;

use Response;

/**
 * Class SuccessCodes
 *
 * @package App\Http
 */
class SuccessCodes {
	const USER_CREATED = 'User has been registred succesfully.';
	const COIN_GAIN_SUCCESS = 'Coin has been gained successfully';
	/**
	 *
	 * @param
	 *        	$code
	 * @return mixed
	 */
	public static function getSuccessMessage($code) {
		return constant ( "static::$code" );
	}
	
	/**
	 *
	 * @param
	 *        	$code
	 * @return mixed
	 */
	public static function getSuccessResponse($code) {
		if (defined ( "static::$code" )) {
			return [ 
					"code" => 200,
					"message" => constant ( "static::$code" ) 
			];
		}
		return [ 
				"code" => 200,
				'message' => $code 
		];
	}
}
