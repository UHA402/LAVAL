<?php

use App\core\Controller\Controller;

class BricksController extends Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		
		$this->view->q = 1;
		$this->view->render('bricks/index');
		
	}

    function edit() {
        $this->view->render('bricks/edit');
    }
		
	
	
	
}