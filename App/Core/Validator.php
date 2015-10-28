<?php namespace App\Core;



class Validator  {

	public function __construct(){
		parent::__construct();
	}

	public static function is_empty($input){
		return (isset($input))?true:false;
	}

	public static function array_has_empty($array){
		foreach ($array as $key=>$value){
			if(self::is_empty($value)){
				return false;
			}
		}
		return true;
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
