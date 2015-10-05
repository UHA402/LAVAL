<?php

use App\core\Controller\Controller;

class BriqueControlleur extends Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		
		$this->view->q = 1;
		$this->view->render('brique/index');
		
	}
		
	
	
	
}