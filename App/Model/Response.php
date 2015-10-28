<?php
use App\Core\Model\Model;

/*
Gestion des réponses
*/

class Response extends Model{


	function _construct(){
		parent::__construct();
	} 
	
	public function createResponse($idUser, $idLesson, $idBrick, $type, $response){// Création d'une réponse
	//	$sqltest = "SELECT COUNT(*) FROM `tresponse` WHERE id_Users = ".$idUser." AND id_Lessons = ".$idLesson." AND id_Bricks =".$idBrick." AND responses = \"".$response."\" AND type = \"".$type."\"";
	//	error_log($sqltest);

		if($req = $this->db->query("INSERT INTO `tresponse`(
		`id_Users`, `id_Lessons`, `id_Bricks`, `responses`, `type`) 
		VALUES(".$idUser.",".$idLesson.",".$idBrick.",\"".$response."\",\"".$type."\")")){
			return 0;
		}
		else{
			return 1;
		}
	}//OK finir COUNT(*)

	public function updateResponse($idResponse, $idUser, $idLesson, $idBrick, $type, $response){// Mise à jour d'une réponse 
		/*$req2 = $this->db->query("SELECT COUNT(*) FROM `tresponse` WHERE 
		`id_Users` = ".$idUser.", id_Lessons = ".$idLesson.", id_Bricks =".$idBrick.
		", responses = \"".$response."\", type = \"".$type."\"");
		if($req2 <> 0){*/
			if($req = $this->db->query("UPDATE `tresponse`
			SET `id_Users` = ".$idUser.", `id_Lessons` = ".$idLesson.", `id_Bricks` = ".$idBrick.", `responses` = \"".$response."\"
			, `type` = \"".$type."\"
			WHERE `id` = ".$idResponse)){
			//$data = $req->fetch();

			return $data;		
			}
			else{
				return false;
			}
		/*}
		else{
			return -1;
		}*/
	}// OK finir verifs


	public function deleteResponse($idResponse){// Suppression d'une réponse
		if($req = $this->db->query("DELETE FROM `tresponse` WHERE `id` = ".$idResponse)){
			return true;
		}
		else{
			return 1;
		}
	}// OK

	public function readResponseByUser($idUser){
		if($req = $this->db->query("SELECT * FROM `tresponse` WHERE `id_Users` = ".$idUser)){
			return $req;

		}
		else{
			return 1;
		}// OK
	}

	public function readResponseByLesson($idLesson){
		if($req = $this->db->query("SELECT * FROM `tresponse` WHERE `id_Lessons` = ".$idLesson)){
			return $data = $req;
		}
		else{
			return 1;
		}// OK

	}

	public function readResponseByBrick($idBricks){
		if($req = $this->db->query("SELECT * FROM `tresponse` WHERE `id_Bricks` =" .$idBricks)){
			return $req;
		}
		else{
			return 1;
		}// OK
	}

}
?>