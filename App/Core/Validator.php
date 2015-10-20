<?php namespace App\Core;

use App\Core\Session;
class Validator extends Model {

	public function __construct(){
		parent::__construct();
	}

	public static function is_empty($input){
		return ($input == '')?true:false;
	}

	public static function array_has_empty($array){
		if (isset($array)){
				foreach ($array as $key=>$value){
					if(self::is_empty($value)){
						return false;
					}
				}
			}else{

				return true;
			}
	}

	public static function is_equal($input, $input1){
		return $input == $input1;
	}

	public static function is_connect($user){
		return Session::get($user);
	}

	public function is_registered($input, $tab='users'){
		return $this->db->query("SELECT * FROM $tab WHERE $input = '$input'");
	}



}
