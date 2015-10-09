<?php namespace App\Core\Model;
 
 use App\Core\Database\Database;
  class Model {
  	

    /* init database connection in model */

    public function __construct() {
    	 $this->db = new Database(DB_NAME,DB_USER, DB_PASS, DB_HOST, $db_type = 'mysql');
    }

  }
 ?>
