<?php 
use App\Core\Controller\Controller;
use App\Core\View\View;
use App\Core\Request\Request;
use App\Core\Validator;
	class SequencesController extends Controller {
		function __construct(){
			parent::__construct();
		}
		
		public function play() {
			$this->view->render('sequences/player');
		}
		
	}