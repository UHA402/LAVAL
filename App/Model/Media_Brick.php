<?php
/**
 * Created by PhpStorm.
 * User: Bofiss
 * Date: 26/10/2015
 * Time: 20:29
 */


use App\Core\Model\Model;

class Media_Brick extends Model
{


    private $id_Bricks;
    private $id_Medias;

    public function __construct(){
        parent::__construct('tbricks_medias');
    }

    public  function get_id_Bricks(){
        return $this->id_Bricks;
    }
    public  function get_id_Medias(){
        return $this->id_Medias;
    }
    public  function set_id_Medias($id){
        $this->id_Medias = $id;
    }
    public  function set_id_Bricks($id){
        $this->id_Bricks = $id;
    }

    public function setFields(){
        $this->setTabFields(['id_Bricks'=>$this->id_Bricks, 'id_Medias'=>$this->id_Medias]);
    }
    
    public function createMediaBricks()
    {
        $i = 0;
        $this->deleteByBrickId($this->id_Bricks);
        $sql = "INSERT INTO tbricks_medias (id_Bricks, id_Medias) VALUES ";
        for ($i = 0; $i < count($this->id_Medias) - 1; $i++) {
            $sql .= "('".$this->id_Bricks."','".$this->id_Medias[$i]."'),";
        }
        $sql .= "('".$this->id_Bricks."','".$this->id_Medias[$i]."');";
        
        return $this->db->query($sql);
    }
    
    public function deleteByBrickId($id)
    {
        return $this->db->query("DELETE FROM tbricks_medias WHERE id_Bricks='$id';");
    }
}
