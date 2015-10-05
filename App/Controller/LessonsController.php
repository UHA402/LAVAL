<?php

	use App\core\Controller\Controller;
	class LessonsControlleur extends Controller {
		function __construct(){
			parent::__construct();
		}
		
		function index() {
			$this->view->render('lessons/index');
		}

		function view() {
			$this->view->render('lessons/view');
		}

		function add() {
			$this->view->render('lessons/add');
		}
	}