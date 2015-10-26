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
	public function CreateBrick (){
		   $this->data = Request::all();
		   $name= Request::input('name');
		   $type= Request::input('type');
		   $media= Request::input('media');
		 
		  
		   	   
		   $data= $this->Brick->FindIDBrickByTitle($name);
			 // Title doesn't exists 
			 if ($data == 0) {
				
				$this->Brick->createBrick($name, $type,$media); 
				$id =$this->Brick->FindIDBrickByTitle($name);
				
				// create media
				$this->Media->create($media, $id);
			
				$this->setFlash("You have created your new brick !", 'success');
			 }
			 else {
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