<?php
   require 'config.php';
   require 'App/Core/Bootstrap.php';
   require 'App/Core/Controller.php';
   require 'App/Core/Model.php';
   require 'App/Core/View.php';
   require 'App/Core/Database.php';
   
   
	/*function _autoload($lass){
		require LIBS .$class. '.php';
	}*/
	
	$app = new Bootstrap();
	$app->init();
