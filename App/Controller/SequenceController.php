<?php 
use App\Core\Controller\Controller;
use App\Core\View\View;
use App\Core\Request\Request;
use App\Core\Validator;

	class SequencesController extends Controller {
		function __construct(){
			parent::__construct();
		}

		/*
		* Sequence update
		*/
		function edit($id = null) {
			$data = Request::all();
			if ($id) {
				if ($sequence = Request::cleanInput($this->Sequence->findById($id))) {
			var_dump($sequence);
					$this->view->sequence = $sequence;
					if ($data && !Validator::array_has_empty($data)) {
						$this->Sequence->update($data);
						$this->setFlash("The sequence has been succesfully updated", "success");
					}
				} else {
					$this->setFlash("This sequence doesn't exist", "warning");
				}
			} elseif($data) {
				$this->Sequence->create($data);
				$this->setFlash("You've created a new sequence !", "success");
			}
			$bricks = $this->Sequence->findAllBricks();
			$this->view->bricks = $bricks;
			$this->view->render('sequences/edit');
		}
		
		/*
		 * Sequences display
		 */
		function index() {
			$sequences = $this->Sequence->findAll();
			$this->view->sequences = $sequences;
			$this->view->render('sequences/index');
		}

		/*
		* Sequence single view
		*/
		function view() {
			$this->view->render('sequences/view');
			$this->view->redirect_to('sequences/view');
		}

		/*
		* Sequance delete
		*/
		function delete() {
			$this->view->render('sequences/delete');
			$this->view->redirect_to('sequences/index');
		}
	}