<?php

namespace App\Http;

use Response;

/**
 * Class ErrorCodes
 *
 * @package App\Http
 */
class ErrorCodes {
	const VALIDATION_ERROR = "validation_error";
	
	// const for TH
	const MOBILE_NUMBER_OR_EMAIL_EMPTY = 'Please fill all the required fields';
	const ARTICLE_ID_EMPTY = 'Article id can not be empty';
	
	/**
	 *
	 * @param
	 *        	$code
	 * @return mixed
	 */
	public static function getErrorMessage($code) {
		return constant ( "static::$code" );
	}
	
	/**
	 *
	 * @param
	 *        	$code
	 * @return mixed
	 */
	public static function getErrorResponse($code) {
		if (defined ( "static::$code" )) {
			return [ 
					"code" => 400,
					"message" => constant ( "static::$code" ) 
			];
		}
		return [ 
				'code' => 400,
				'message' => $code 
		];
	}
	
	/**
	 * Function use to throw errorExceptions.
	 * 
	 * @param $message string
	 *        	[Message to send]
	 * @param $statusCode int
	 *        	[Http status code]
	 * @return Json response
	 */
	public static function throwError($message = 'There seems some problem. Please try again later.', $statusCode = 500) {
		return Response::json ( [ 
				"errorMessage" => $message 
		], $statusCode );
	}
}
