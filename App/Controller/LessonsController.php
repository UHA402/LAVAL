<?php

	use App\core\Controller\Controller;
	class LessonsController extends Controller {
		function __construct(){
			parent::__construct();
		}
		
		function index() {
			$this->view->render('lessons/index');
			$this->view->redirect_to('lessons/index');
		}

		function view() {
			$this->view->render('lessons/view');
		}

		function edit() {
			$this->view->render('lessons/edit');
		}

		function delete() {
			$this->view->render('lessons/delete');
		}
	}