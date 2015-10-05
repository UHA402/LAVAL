<?php namespace App\core\Model;
 
 use App\core\Database\Database;
  class Model {
  	

    /* init database connection in model */

    public function __construct() {
      $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

  }
 ?>
