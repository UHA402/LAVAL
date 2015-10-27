<?php namespace App\Core\Model;
 
 use App\Core\Database\Database;
 use App\Core\Request\Request;
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
    
    public function create($tab= null){
        
        $sql = "INSERT INTO $this->tab";
        $sql .= " (`".implode("`, `", array_keys($this->fields))."`)";
        $sql .= " VALUES ('".implode("', '", $this->fields)."') ";
        $this->db->query($sql);
    }

       /**
       * @param $tab
       * @return string
       */
      protected function query_create($tab) {
        $sql="";
          $sql .= " (`".implode("`, `", array_keys($tab))."`)";
        $sql .= " VALUES ('".implode("', '", $tab)."') ";
        return $sql;
      }
      
        /**
       * @param $tab
       * @return string
       */
      protected function query_update($tab) {
        $temp =[];
        foreach ($tab as $key => $value) {
              $temp[] = $key.'= "'.$value.'"';
          }
        return  implode (',', $temp);
      }
      
      
      

      /**
       * @return array|bool
       */
      public function read(){
          $sql = "SELECT * FROM $this->tab";
          return $this->db->query($sql);
      }


      /**
       * @param $id
       * @return array|bool
       */
      public function update($id, $tab =null){
          $sql = "UPDATE $this->tab SET ";
          if(is_null($tab)){
            $sql .= $this->query_update($this->fields);
            $sql .= 'WHERE id="'.$id.'"';
          }else{
             $sql .= $this->query_update($tab);
            $sql .= 'WHERE id="'.$id.'"';
          }
          return $this->db->query($sql);
      }


      /**
       * delete selected id in database table
       *
       * @param $id
       * @return array|bool
       */
      public function delete($id){
          $sql = "DELETE FROM $this->tab WHERE id='".$id."'";
          return $this->db->query($sql);
      }


      public function retrieveId($field, $key){
          $sql = "SELECT id FROM $this->tab WHERE $field ='".$key."'";
          $data = Request::cleanInput($this->db->query($sql));
          return intval($data['id']);
      }

  }



 ?>
