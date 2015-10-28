<?php
use App\core\Controller\Controller;

class ResponsesController extends Controller {
	function __construct(){
		parent::__construct();
	}

	function index($idUser, $idLesson, $idBrick, $type, $response){
		$this->Response->createResponse($idUser, $idLesson, $idBrick, $type, $response);
		$this->view->render("response/index");
	}
}
?>