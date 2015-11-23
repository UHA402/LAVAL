<?php
use App\Core\Controller\Controller;
use App\Core\Request\Request;
//use App\Core\View\View;

class BricksController extends Controller {
    public function __construct(){
        parent::__construct();
        $this->loadModel('media');
        $this->loadModel('media_Brick');
    }

    /*
     * Fetch and display bricks
     */
    public function index(){
        if (!$this->verifConnexion()) {
            return 0;
        }
        
        $data = $this->Brick->ReadAllTitleBricks();
        $this->view->data = $data;
        $this->view->render('bricks/index');
    }

    /*
     * Create and update bricks
     */
    public function edit($id = null){
        if (!$this->verifConnexion()) {
            return 0;
        }
        
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
    public function CreateBrick() {
        if (!$this->verifConnexion()) {
            return 0;
        }
        
        $name= Request::input('title');
        $type= Request::input('type');
        $media= Request::input('data');
        $data = Request::all();
        
        
        $bricks= $this->Brick->FindIDBrickByTitle($name);
        // Title doesn't exists
        if ($bricks == 0) {
            //var_dump($_FILES);
            //$this->Media->upload('inputFile', 'public/uploads/medias');
            //die();
            $this->Media->setTitle(explode(', ', $media));
            //$this->Media->setUrl(URL.'medias/'.$media);
            $tabMedia = $this->Media->upload('inputFile', 'public/uploads/medias');
            
            foreach ($tabMedia as $id=>$media) {
                $tabMedia[$id] = URL.$media;
            }
            
            $this->Media->setUrl($tabMedia);
            $this->Media->setType($type);
            //$this->Media->setFields();
            
            if($data) {
                $this->Brick->create($data);
                $tabId = $this->Media->createMedia();
                $this->Media_Brick->set_id_Bricks($this->Brick->FindIDBrickByTitle($name));
                //$this->Media_Brick->set_id_Medias($this->Media->retrieveId('title', $media));
                $this->Media_Brick->set_id_Medias($tabId);
                $this->Media_Brick->setFields();
                //create pivot table link elements
                $this->Media_Brick->createMediaBricks();
                $this->setFlash("You have created your new brick !", 'success');
                // create media
            } else {
                $this->setFlash("Failure", 'danger');
            }
        } else {
            $this->setFlash(" This title already exists choose another one !", "danger");
        }

        $this->view->redirect_to('brick/edit');
    }

    /*
     * Delete bricks
     */
    public function delete($id = null, $valid = null){
        if (!$this->verifConnexion()) {
            return 0;
        }

        if ($valid == 'yes') {
            if ($this->Brick->ReadBrick($id)) {
                $this->Brick->delete($id);
                $this->Media_Brick->deleteByBrickId($id);
                $this->setFlash('The brick has been deleted', "success");
                $this->view->redirect_to('brick/edit');
            } else {
                $this->setFlash("This brick doesn't exist", "warning");
                $this->view->redirect_to('brick/edit');
            }
        } else {
            $_SESSION["brickToDelete"] = $this->Brick->ReadBrick($id);
            $this->view->render('bricks/delete');
        }
    }

    /*
     * Update bricks
     */
    public function UpdateBrick ($id = null){
        if (!$this->verifConnexion()) {
            return 0;
        }
        
        $this->data = Request::all();
        if($this->Brick->update($id, $this->data )){
            $this->setFlash('The brick has been updated', "success");
            $this->view->redirect_to('brick/edit');
        } else {
            $this->setFlash("Problem occur while updating Brick", "warning");
            $this->view->redirect_to('brick/edit');
        }
    }
}
