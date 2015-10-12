<?php namespace App\Core\View;

   

  class View {
    
   private $params;
    // Moteur de rendu des vues.
    public function render($view, $params=array())
  	{
      
        $this->params = $params;
        require 'App/View/header.php';
        require 'App/View/navbar.php';
        require 'App/View/'. $view. '.php';
        require 'App/View/footer.php';
  	}
    
    public function getParams(){
      return $this->params;
    } 
    
  
    
    public function getFlash(){
        return Session::get('flash');
     }


  }
 ?>
