<?php  namespace App\Core\Request;

class Request {


  /*
  	* return clean table
  	*
  	*@var $item
  	*
  	*@return array
  	*/
	public  static function cleanInput($item){
		$clean_input = [];
		if(is_array($item)){
			foreach($item as $key=>$value){
				$clean_input = $value;
			}
		}
		else {
			if(get_magic_quotes_gpc()){
				$data = trim(stripslashes($item));
			}
			$data = strip_tags($data);
			$clean_input = trim($data);
		}
		return $clean_input;
	}

  /*
  	* return specified clean input request table
  	*
  	*@var ....
  	*
  	*@return array
  	*/
	public static function all(){
		$data = $_REQUEST ;//file_get_contents('php://input');
		unset($data['url']);
		$data = self::cleanInput($data);
		return $data;
	}

	/**
	* return specified input name
	*
	*@var $name
	*
	*@return string
	*/

	public static function input($name){
		$clean_input= self::cleanInput($_REQUEST);
		return $clean_input[$name];
	}
	/**
     * to determine if value is present on the request
     *
     * @param $name
     * @return bool
     */
    public static function has($name){
		if(!isset($_REQUEST[$name]) && $_REQUEST[$name] != ""){
			return false;
		}
		return true;
    }

    /**
     * retrieving subset of provided inputs data
     *
     * @param array $input
     * @return array
     */
    public static function only($input = []){
		$only_inputs =[];
	    $clean_input= self::cleanInput($_REQUEST);
		foreach($input as $keys => $value){
			$only_inputs[$value] = $clean_input[$value];
			
		}
		return $only_inputs;
	}
	



}
