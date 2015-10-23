<?php use App\core\Controller\Controller;

	class SequenceController extends Controller {
		function __construct(){
			parent::__construct();
		}
		
		/*
		 * Sequences display
		 */
		function index() {
			$this->view->render('sequences/index');
			$this->view->redirect_to('sequences/index');
		}

		/*
		* Sequence single view
		*/
		function view() {
			$this->view->render('sequences/view');
			$this->view->redirect_to('sequences/view');

		}

		/*
		* Sequence update
		*/
		function edit() {
			$this->view->render('sequences/edit');
			$this->view->redirect_to('sequences/edit');

		}

		/*
		* Sequance delete
		*/
		function delete() {
			$this->view->render('sequences/delete');
			$this->view->redirect_to('sequences/index');

		}
	}