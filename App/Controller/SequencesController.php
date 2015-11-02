<?php 
use App\Core\Controller\Controller;
use App\Core\View\View;
use App\Core\Request\Request;
use App\Core\Validator;
	class SequencesController extends Controller {
		function __construct(){
			parent::__construct();
			$this->loadModel('Sequence_Brick');
		}
		/*
		* Sequence update
		*/
		function edit($id = null) {
			$data = Request::all();
			$post = $_POST;
			if ($id) {
				if ($sequence = Request::cleanInput($this->Sequence->findById($id))) {
					$this->view->sequence = $sequence;
					if ($post && !Validator::array_has_empty($post)) {
						// $this->Sequence_Brick->edit($sequence_id, $bricks_id);
						// $this->Sequence->update($id, $data);
						$this->setFlash("The sequence has been succesfully updated", "success");
					} else {
						$this->setFlash("No data", "danger");
					}
				} else {
					$this->setFlash("This sequence doesn't exist", "warning");
				}
			} elseif(isset($post['sequence']) && isset($post['sequence_bricks_id'])) {
				$this->Sequence->create($post['sequence']);
				$length = count($post['sequence_bricks_id']);
				$bricks_id = '';
				foreach ($post['sequence_bricks_id'] as $key => $id) {
					if ($key == $length+1) {
						$bricks_id .= $id;
					} else {
						$bricks_id .= $id.", ";		
					}
				}
				$sequence_id = $this->Sequence->findLastId();
				$this->Sequence_Brick->save($sequence_id, $bricks_id);
				$this->setFlash("You've created a new sequence ! Congrats !", "success");
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
		function delete($id, $confirm = null) {
			if ($id) {
				if ($sequence = $this->Sequence->findById($id)) {
					if ($confirm && isset($_SESSION['token']) && $confirm == $_SESSION['token']) {
						$this->Sequence->delete($id);
						$this->Sequence_Brick->delete($id);
						unset($_SESSION['token']);
						$this->setFlash('The sequence has been deleted', "success");
						$this->view->redirect_to('/sequence/edit');
					}
					else {
						$token = md5(rand());
						$_SESSION['token'] = $token;
						$this->view->sequence = $sequence;
						$this->view->token = $token;
						$this->view->brick_id = $id;
						$this->view->render('sequences/delete');	
					}
				}
			} else {
				$this->setFlash("You cannot delete a sequence without its id");
			}
		}
	}