<?php namespace App\Core\Model;
 
 use App\Core\Database\Database;
  class Model {
  	

     Protected $tab;
    protected $fields =[];
    protected $tab_fields =[];
    /* init database connection in model */

    public function __construct($tab)
    {
        $this->db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST, $db_type = 'mysql');
        $this->tab = $tab;
      
    }

   public function setTabFields($field =[]){
        foreach ($field as $key => $value) {
            $this->fields[$key] = $value;
        }
      
       
    }
    
    public function create(){
        echo '<pre>';
        print_r($this->fields);
        $sql = "INSERT INTO $this->tab";
        $sql .= " (`".implode("`, `", array_keys($this->fields))."`)";
        $sql .= " VALUES ('".implode("', '", $this->fields)."') ";
        $this->db->query($sql);
    }

      public function update($id){
          $sql = "UPDATE $this->tab SET ";
          $sql .= " (`".implode("`, `", array_keys($this->fields))."`)";
          $sql .= " VALUES ('".implode("', '", $this->fields)."') ";
          $this->db->query($sql);
      }


  }
 ?>
