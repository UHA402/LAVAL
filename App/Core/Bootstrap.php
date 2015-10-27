<?php 

class Bootstrap {

	private $_url = null;
	private $_controller = null;
    private $ctrl = null;
	private $_controllerPath = 'App/Controller/';
	private $_modelPath = 'App/Model/'; 
	private $_errorFile = 'ErrorsController.php';
	private $_defaultFile = 'IndexController.php';

	/**
	 * initialisation du Bootstrap
	 *
	 * @return boolean
	 */
	public function init()
	{
		// on charge l'url
		$this->_getUrl();

		// chargement url par defaut
		if (empty($this->_url[0])) {
			$this->_loadDefaultController();
			return false;
		}

		$this->_loadExistingController();
		$this->_callControllerMethod();
	}
	
	

	
	public function setDefaultFile($path)
	{
		$this->_defaultFile = trim($path, '/');
	}

	/**
	 *  parametre de passe a l'url par get.
	 */
	private function _getUrl()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$this->_url = explode('/', $url);
	}

	/**
	 * Chargement du controlleur par defaut
	 */
	private function _loadDefaultController()
	{
		require $this->_controllerPath . $this->_defaultFile;
		$this->_controller = new IndexController();
		$this->_controller->index();
	}

	/**
	 * chargement du trolleur si le get  a passé des parametre.
	 *
	 * @return boolean|string
	 */
	private function _loadExistingController()
	{
		$file = $this->_controllerPath . ucfirst($this->_url[0]) . 'sController.php';
        $this->ctrl = ucfirst($this->_url[0]). 'sController';
		if (file_exists($file)) {
			require $file;
			$this->_controller = new $this->ctrl();
		
			$this->_controller->loadModel($this->_url[0]);
		} else {
			$this->_error();
			return false;
		}
	}

	/**
	 * 
	 */
	private function _callControllerMethod()
	{
		$length = count($this->_url);
	

		// véfifie l'existance de la methode appelé.
		if ($length > 1) {
			if (!method_exists($this->_controller, $this->_url[1])) {
				$this->_error();
			}
		}

		// charge la methode correspondante
		switch ($length) {
			case 7:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4],$this->_url[5], $this->_url[6]);
				break;
			case 6:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4],$this->_url[5]);
				break;

			case 5:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
				break;


			case 4:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
				break;

			case 3:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;

			case 2:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}();
				break;

			default:
				$this->_controller->index();
				break;
		}
	}

	/**
	 * Affiche la page d'erreur si rien n'existe
	 *
	 * @return boolean
	 */
	private function _error() {
		require $this->_controllerPath . $this->_errorFile;
		$this->_controller = new ErrorsController();
		$this->_controller->index();
		return false;
	}

}