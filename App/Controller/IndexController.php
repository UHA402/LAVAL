<?php
use App\Core\Controller\Controller;
use App\Core\View\View;
class IndexController extends Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->q = "Belle belle";
        $this->view->render('index/index');
    }
    
    
    
}