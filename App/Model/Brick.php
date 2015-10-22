<?php

use App\Core\Model\Model;
/*
 * Gestion des données utilisateur
 */
class Brick extends Model{

	public function __contruct(){
	   parent::__construct();
	}




	function CreateBrick($strTitle,$strType,$strData){


	    $data=$this->db->query("INSERT INTO tbricks(title, type, data) VALUES ('".$strTitle."','".$strType."','".$strData."' )");
      	return $data;
	}

	public function ReadAllTitleBricks(){

		$data = $this->db->query("SELECT title FROM tbricks");

		$array = array();

		foreach ($data as $row) {

			array_push($array, $row['title']);

		}
		return $array;
	}

	public function FindIDBrickByTitle($strTitle){
		$data = $this->db->query("SELECT id FROM tbricks WHERE title='".$strTitle."'");
		// If result is empty
		//if ($data == false) {
		  if (empty($data)) {

			return 0;
		}
		else {
			$array = array();
			foreach ($data as $row) {

				array_push($array, $row['id']);

			}
			$id= intval($array[0]);
			return $id;
		}
	}

	public function DeleteBrick($iID){
		$data = $this->db->query("DELETE FROM `tbricks` WHERE id='".$iID."'");

		return $data;

	}

	public function UpdateBrick($iID,$strTitle,$strType,$strData,$strType_response,$strDuree){

		$data = $this->db->query("UPDATE `tbricks` SET title='".$strTitle."',type ='".$strType."',data='".$strData."',type_response='".$strType_response."',duree='".$strDuree."' WHERE id= '".$iID."'");
		return $data;

	}


	public function ReadNumberBricks(){
		$data = $this->db->query("SELECT COUNT(*) FROM tbricks");

		foreach($data as $row){
	    $nbBricks=intval($row['COUNT(*)']);
	    return $nbBricks;

	    }


	}

	public function ReadBrick($iID){
		$data = $this->db->query("SELECT * FROM tbricks WHERE id='".$iID."'");
		return $data[0];
	}

	
    public function ReadAllBrick(){
		$data = $this->db->query("SELECT `id`, `title`, `type`, `data` FROM `tbricks` ");
		return $data;

	}


}



<<<<<<< HEAD
=======







>>>>>>> f3477362d8093742564928839f7f1034c7d15c1c
?>
