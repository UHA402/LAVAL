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
			var_dump($data);
			$post = $_POST;
			var_dump($post);
			$this->Sequence->create();
			// $this->Sequence_Brick->create();

			if ($id) {
				if ($sequence = Request::cleanInput($this->Sequence->findById($id))) {
					$this->view->sequence = $sequence;
					if ($data && !Validator::array_has_empty($data)) {
						$this->Sequence->update($id, $data);
						$this->setFlash("The sequence has been succesfully updated", "success");
					}
				} else {
					$this->setFlash("This sequence doesn't exist", "warning");
				}
			} elseif(isset($post['sequence']) && isset($post['sequence_bricks'])) {
				$this->Sequence->create($post['sequence']);
				$this->Sequence_Brick->create($post['sequence_bricks']);
				$this->setFlash("You've created a new sequence !", "success");
			}

			$bricks = $this->Sequence->findAllBricks();
			$sequences = $this->Sequence->findAll();
			$this->view->bricks = $bricks;
			$this->view->sequences = $sequences;
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