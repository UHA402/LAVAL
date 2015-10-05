<?php

	use App\core\Controller\Controller;
	class LessonsControlleur extends Controller {
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			
			$this->view->render('lessons/index');
		}
	
	
	}