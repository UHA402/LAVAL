<?php

use App\core\Controller\Controller;
use App\core\Request;
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

   public function edit(){
	    $array = $this->Brick->ReadAllBrick();
		$this->view->msg = $array;
		$data = $this->Brick->ReadAllTitleBricks();
	 	$this->view->data = $data;
		
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
			$this->setFlash("you have created your new brick !", 'success');
		 }
		 else {
			$this->setFlash(" This title already exists choose another one !", "danger");
		 }
		 //setFlash($message, $type = 'info', $title = null)
		 
	    
	     $this->view->redirect_to('/brick/edit');
	   

   }
   
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  /* public function UpdateBrick (){
	   $clean_inputs=[];
	   $this->data = Request::all();
	   foreach($this->data as $keys=>$value){
		   $clean_inputs = $value;
		   
	   }
	    echo'<pre>';
	        print_r($clean_inputs);
	  
	  
	   
	   $ee= $clean_inputs['name'];
	   	   
	   $this->setFlash($ee, 'success');*/
	   
	   //$id= $this->Brick->FindIDBrickByTitle($this->data['oldtitle']);
	  
	 /* $test= true;
	   $array = $this->Brick->ReadAllTitleBricks();
	   foreach ($array as $name) {
				$id= $this->Brick->FindIDBrickByTitle($name);
				if (($this->data['bricks[id]'] != $id)&&($this->data['bricks[name]']==$name)){
					$test = false;
				}
	   }
	   
		// New title doesn't exists : OK
		if ($test == true){
			$this->Brick->UpdateBrick($this->data['bricks[id]'],$this->data['bricks[name]'], $this->data['bricks[type]'],$this->data['bricks[data]'],$this->data['bricks[type_response]'], $this->data['bricks[duree]']); 
			$this->setFlash("The Brick is updated", 'success');
		}
		else {
				$this->setFlash("The title of the brick is already used", 'danger');
		
		// A voir la vue..*/
		/*$this->view->redirect_to('/bricks/create');
		}
   }*/

   /*public function show(){
       $this->data = Request::all();
	   $this->view->render('bricks/create');
   }

   public function delete(){
       $this->data = Request::all();
	   $this->view->render('bricks/create');
   }*/

}
