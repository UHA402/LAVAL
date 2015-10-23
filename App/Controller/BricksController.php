<?php
use App\Core\Controller\Controller;
use App\Core\Request\Request;
use App\Core\View\View;

class BricksController extends Controller {
	
	function __construct(){
		parent::__construct();

	}

	function index(){
		$data = $this->Brick->ReadAllTitleBricks();
		$this->view->data = $data;
		$this->view->render('bricks/index');

	}

	public function edit($id = null){
		if ($id) {
			if ($this->Brick->findById($id)) {
				$currentBrick = Request::cleanInput($this->Brick->findById($id));
				$this->view->currentBrick = $currentBrick;
			} else {
				$this->setFlash("This brick doesn't exist", "warning");
			}
		}
		$bricks =$this->Brick->ReadAllBrick();
	 	$this->view->bricks = $bricks;
	 	$this->view->render('bricks/edit');
					
	}   
	 
//-------------------------------------------------------------------------------------------------------------------------------
	public function CreateBrick (){
		   $this->data = Request::all();
		
		   $name= Request::input('name');
		   $type= Request::input('type');
		   $media= Request::input('media');
		   //var_dump($name);
		   //return;
		   	   
		   $data= $this->Brick->FindIDBrickByTitle($name);
			 // Title doesn't exists 
			 if ($data == 0) {
				$this->Brick->createBrick($name, $type,$media); 
				$this->setFlash("You have created your new brick !", 'success');
			 }
			 else {
				$this->setFlash(" This title already exists choose another one !", "danger");
			 }
			 //setFlash($message, $type = 'info', $title = null)
			 
		    
		     $this->view->redirect_to('/brick/edit');
		   

	}

	public function delete($id){
		if ($this->Brick->findById($id)) {
	   		$this->Brick->delete($id);
	   		$this->setFlash('The brick has been deleted', "success");
	   		$this->view->redirect_to('/brick/edit');
		} else {
			$this->setFlash("This brick doesn't exist", "warning");
			$this->view->redirect_to('/brick/edit');

		}
	}
   

  public function UpdateBrick ($id){
	  
	   $this->data = Request::all();
	   if($this->Brick->UpdateBrick($id, $this->data )){
		   $this->setFlash('The brick has been updated', "success");
	   	   $this->view->redirect_to('/brick/edit');
	   }
	   else{
		   $this->setFlash("Problem occur while updating Brick", "warning");
			$this->view->redirect_to('/brick/edit');
	   }
  }
	 

   /*public function show(){
       $this->data = Request::all();
	   $this->view->render('bricks/create');
   }

   public function delete(){
       $this->data = Request::all();
	   $this->view->render('bricks/create');
   }*/

}
