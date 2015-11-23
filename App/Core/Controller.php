<?php namespace App\Core\Controller;
use App\Core\View\View;
use App\Core\Session;
// Initialisation de la session dans tous les controleurs
Session::init();


 /**
  * @Controlleur principal
  */
 class Controller
 {
   protected $model =null;

   function __construct()
   {
   	/* main controller */

   	$this->view = new View();
   }

   public function loadModel($name){
     /* recupere le chemin du model */
        $n = ucfirst($name);
       $name .="s";
       $table = 't'.$name;

        $path = 'App/Model/'.$n.'.php';

        /* vérifie si le model exixte et l' initialise */

        if(file_exists($path)){
          require 'App/Model/'.$n.'.php';
          $this->$n = new $n($table); // modification, pour pourvoir faire par exemple $this->User->method
          // $this->model = new $name();
        }
   }

     public function setFlash($message, $type = 'info', $title = null) {
         if ($message) {
             $_SESSION['flash'] = array(
                 'message' => $message,
                 'type' => $type,
                 'title' => $title
             );
         }
     }
     
     public function formatToJson($tab){
        return json_encode($tab);
     }
     
    public function verifConnexion()
    {
        if (!isset($_SESSION['user'])) {
            $this->setFlash("You need to be connected to access in this page", 'danger');
            $this->view->redirect_to('user/connect');
            return false;
        } else {
            return true;
        }
    }

 }
