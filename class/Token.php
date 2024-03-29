<?php

/**
 * 
 */
class Token
{
	public static function generate()
	{
		return Session::put(Config::get('session/token_name'), md5(uniqid()));
	}
	public static function check($token)
	{
		$token_name = Config::get('session/token_name');
		if (Session::exist($token_name) && $token === Session::get($token_name)) {
			Session::delete($token_name);
			return true;
		}
		return false;
	} 
}