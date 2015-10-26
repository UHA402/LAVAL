<?php 
namespace App\Core\Model;
 use App\Core\Database\Database;

  class Model {
  	
    protected $tab;
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
    
    public function create(array $data = null){
        $sql = "INSERT INTO $this->tab";
        var_dump($data);
        if ($data) {
          $sql .= " (`".implode("`, `", array_keys($data))."`)";
          $sql .= " VALUES ('".implode("', '", $data)."') ";
        var_dump($sql);     
       } else {
          $sql .= " (`".implode("`, `", array_keys($this->fields))."`)";
          $sql .= " VALUES ('".implode("', '", $this->fields)."') ";
       }
        $this->db->query($sql);
    }

      public function update($id){
          $sql = "UPDATE $this->tab SET ";
          $sql .= " (`".implode("`, `", array_keys($this->fields))."`)";
          $sql .= " VALUES ('".implode("', '", $this->fields)."') ";
          $this->db->query($sql);
      }
  }