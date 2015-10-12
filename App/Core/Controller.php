<?php namespace App\Core\Controller;

use App\Core\View\View;
use App\Core\Session;

 /**
  * @Controlleur principal
  */
 class Controller
 {
   protected $model =null;
   
   function __construct()
   {
   	/* initialisation de la vue */
   	$this->view = new View();
   }

   public function loadModel($model){
     /* recupere le chemin du model */
       // $path = 'App/Model/'.$model.'.php';
        /* vérifie si le model exixte et l' initialise */
      
        //
          require 'App/Model/'.$model.'.php';
          return new $model();     
        
   }
   
    public function setFlash($message, $type = 'info', $title = null) {
         if ($message) {
             Session::set('flash',
              [
                 'message' => $message,
                 'type' => $type,
                 'title' => $title
               ]);
             return true;
         }
         return false;
     }
     
     public function getFlash(){
        return Session::get('flash');
     }
   
 }
