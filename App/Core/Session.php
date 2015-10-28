<?php namespace  App\Core;

class Session {

	public static function init(){
		@session_start();
	}

	public static  function set($key, $value){
		$_SESSION[$key] = $value;
	}

	public static function get($key){
		if (isset($_SESSION[$key])){
			return $_SESSION[$key];
		}
		return false;
	}

	public static function destroy(){
		session_destroy();
	}
	
	public static function setFlash($message, $type = 'info', $title = null) {
         if ($message) {
             $_SESSION['flash'] = array(
                 'message' => $message,
                 'type' => $type,
                 'title' => $title
             );
         }
     }

}
