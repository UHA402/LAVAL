<?php namespace  App\core\Session;

class Session {
	
	public static function init(){
		@session_start();
	}
	
	public static  function setSession($keys, $value){
		$_SESSION[$key] = $value;
	}
	
	public static function getSession($key){
		if (isset($_SESSION[$key])){
			return $_SESSION[$key];
		}
	}
	
	public static function destroySession(){
		session_destroy();
	}
	
}