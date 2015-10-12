<?php

	use App\core\Controller\Controller;
	class LessonsController extends Controller {
		function __construct(){
			parent::__construct();
		}
		
		function index() {
			$this->view->render('lessons/index');
		}

		function view() {
			$this->view->render('lessons/view');
		}


		/** Charge la vue d'edition des leçons
		 *
         */
		function edit() {
			$this->view->render('lessons/edit');
		}

		function delete() {
			$this->view->render('lessons/delete');
		}
	}