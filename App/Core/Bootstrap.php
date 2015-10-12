<?php 

class Bootstrap {
	
	protected $controller = 'Home'; /*'Home';*/ 
	protected $method = 'index'; /*'index'*/
	protected $params = array();
	protected $_url =null;

	
	public function __construct(){
		 $this->_parseUrl();
		 
		if(file_exists('App/Controller/'.ucfirst($this->_url[0]).'Controller.php')){
			$this->controller = ucfirst($this->_url[0]);
			unset($this->_url[0]);
			
		}
	    require_once 'App/Controller/'.$this->controller.'Controller.php';
		$this->controller = $this->controller.'Controller';
		$this->controller = new $this->controller;
		
		if(isset($this->_url[1])){
			if(method_exists($this->controller, $this->_url[1])){
				$this->method = $this->_url[1];
				unset($this->_url[1]);
			}
		}
		
		
		$this->params = $this->_url ? array_values($this->_url): array();
		call_user_func(array($this->controller, $this->method), $this->params);
		
	}
	
	private function  _loadExistingController(){
		
	}
	
	public function _parseUrl(){
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		 $this->_url = explode('/', $url);
		
	}
	
	
}