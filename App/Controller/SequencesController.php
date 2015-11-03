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
			if ($id) {
				if (Request::cleanInput($this->Sequence->findById($id))) {
					if ($_POST && !Validator::array_has_empty($_POST)) {
						$sequence_bricks = Request::cleanInput($this->Sequence_Brick->findBySeqId($id));
						$length = count($_POST['sequence_bricks_id']);
						$bricks_id = '';
						foreach ($_POST['sequence_bricks_id'] as $key => $brick_id) {
							if ($key == $length+1) {
								$bricks_id .= $brick_id;
							} else {
								$bricks_id .= $brick_id.",";
							}
						}
						$this->Sequence_Brick->edit($sequence_bricks['id'], $sequence_bricks['sequence_id'], $bricks_id);
						$this->Sequence->update($id, $_POST['sequence']);
						// $sequence = Request::cleanInput($this->Sequence->findById($id));
						// $sequence_bricks = Request::cleanInput($this->Sequence_Brick->findBySeqId($id));
						// $bricksId = explode(',', $sequence_bricks['bricks_id']);
						// $this->view->sequence = $sequence;
						// $this->view->sequence_bricks = $bricksId;
						$this->setFlash("The sequence has been succesfully updated", "success");
					}
						$sequence = Request::cleanInput($this->Sequence->findById($id));
						$sequence_bricks = Request::cleanInput($this->Sequence_Brick->findBySeqId($id));
						$bricksId = explode(',', $sequence_bricks['bricks_id']);
						$this->view->sequence = $sequence;
						$this->view->sequence_bricks = $bricksId;
				} else {
					$this->setFlash("This sequence doesn't exist", "warning");
				}
			} elseif(isset($_POST['sequence']) && isset($_POST['sequence_bricks_id'])) {
				$this->Sequence->create($_POST['sequence']);
				$length = count($_POST['sequence_bricks_id']);
				$bricks_id = '';
				foreach ($_POST['sequence_bricks_id'] as $key => $id) {
					if ($key == $length+1) {
						$bricks_id .= $id;
					} else {
						$bricks_id .= $id.",";
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
