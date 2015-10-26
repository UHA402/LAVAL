<?php
use App\Core\Controller\Controller;
use App\Core\Request\Request;
use App\Core\View\View;

class BricksController extends Controller {
	
	public function __construct(){
		parent::__construct();
		$this->loadModel('media');
	}

	/* 
	 * Fetch and display bricks 
	 */
	public function index(){
		$data = $this->Brick->ReadAllTitleBricks();
		$this->view->data = $data;
		$this->view->render('bricks/index');
	}

	/* 
	 * Create and update bricks 
	 */
	public function edit($id = null){
		if ($id) {
			if ($this->Brick->ReadBrick($id)) {
				$currentBrick = Request::cleanInput($this->Brick->ReadBrick($id));
				$this->view->currentBrick = $currentBrick;
			} else {
				$this->setFlash("This brick doesn't exist", "warning");
			}
		}
		$bricks =$this->Brick->ReadAllBrick();
	 	$this->view->bricks = $bricks;
	 	$this->view->render('bricks/edit');	
	}   

	/* 
	 * Create bricks 
	 */
	public function CreateBrick(){
		   $name= Request::input('title');
		   $type= Request::input('type');
		   $media= Request::input('data');
		   $data = Request::all();
		   
		   $bricks= $this->Brick->FindIDBrickByTitle($name);
			 // Title doesn't exists
			 if ($bricks == 0) {
				$this->Media->setTitle($media);
				$this->Media->setUrl(URL.'medias/'.$media);
				$this->Media->setType($type);
				$this->Media->setFields();

				if($data){
					$this->Brick->create($data);
					$this->Media->create();
					$this->setFlash("You have created your new brick !", 'success');
					// create media
				} else {
					$this->setFlash("Failure", 'danger');
				}		
			 } else {
				$this->setFlash(" This title already exists choose another one !", "danger");
			 }

		      $this->view->redirect_to('/brick/edit');
	}

	/* 
	 * Delete bricks 
	 */
	public function delete($id){
		if ($this->Brick->ReadBrick($id)) {
	   		$this->Brick->delete($id);
	   		$this->setFlash('The brick has been deleted', "success");
	   		$this->view->redirect_to('/brick/edit');
		} else {
			$this->setFlash("This brick doesn't exist", "warning");
			$this->view->redirect_to('/brick/edit');

		}
	}

	/* 
	 * Update bricks 
	 */
	public function UpdateBrick ($id){
		$this->data = Request::all();
		if($this->Brick->UpdateBrick($id, $this->data )){
			$this->setFlash('The brick has been updated', "success");
			$this->view->redirect_to('/brick/edit');
		} else {
			$this->setFlash("Problem occur while updating Brick", "warning");
			$this->view->redirect_to('/brick/edit');
		}
	}
}