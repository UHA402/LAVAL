<?php namespace App\Core\View;



  class View {
    
    protected $param = array();

  	public  function __construct(){
  		
  	}
    
    public function getParams(){
      return $this->$param;
    }
   
    // Moteur de rendu des vues.
    public function render($name)
  	{
      require 'App/View/header.php';
      require 'App/View/navbar.php';
      require 'App/View/'.$name.'.php';
      require 'App/View/footer.php';
  	}

    public function getFlash() {
      if(isset($_SESSION['flash'])){ ?>
      <div class="alert alert-<?php echo $_SESSION['flash']['type'] ?>">
        <?php if ($_SESSION['flash']['title']) echo '<strong>'.$_SESSION['flash']['title'].'</strong>'; ?>
        <?php echo $_SESSION['flash']['message']; ?>
      </div><?php
        unset($_SESSION['flash']);
      }
    }

  }