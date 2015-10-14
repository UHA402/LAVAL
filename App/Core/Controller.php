<?php namespace App\Core\Controller;
use App\Core\View\View;
// Initialisation de la session dans tous les controleurs
session_start();


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
        $name = ucfirst($name);

        $path = 'App/Model/'.$name.'.php';

        /* vérifie si le model exixte et l' initialise */
      
        if(file_exists($path)){
          require 'App/Model/'.$name.'.php';
          $this->$name = new $name(); // modification, pour pourvoir faire par exemple $this->User->method
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
   
 }
