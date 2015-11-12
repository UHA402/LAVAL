<?php use App\Core\Model\Model;

/**
 * Brick manager
 */
class Brick extends Model{

	public function __contruct(){
	   parent::__construct("tbricks");
	}

	/**
	 * Find all title brick in the database
	 */
	public function ReadAllTitleBricks(){
		$data = $this->db->query("SELECT title FROM tbricks");
		$array = array();
		foreach ($data as $row) {
			array_push($array, $row['title']);
		}
		return $array;
	}

	/**
	 * Return the number of bricks in the database
	 */
	public function ReadNumberBricks(){
		$data = $this->db->query("SELECT COUNT(*) FROM tbricks");
		foreach($data as $row){
	 		$nbBricks=intval($row['COUNT(*)']);
	 		return $nbBricks;
	  }
	}

	/**
	 * Find just only one brick by id
	 */
	public function ReadBrick($iID){
		$data = $this->db->query("SELECT * FROM tbricks WHERE id='".$iID."'");
		return $data;
	}

	/**
	 * Find all bricks
	 */
  	public function ReadAllBrick(){
		$data = $this->db->query("SELECT `id`, `title`, `type`, `data` FROM `tbricks` ");
		return $data;
	}

	/**
	 * Find a brick's id by his title
	 */
	public function FindIDBrickByTitle($strTitle){
		$data = $this->db->query("SELECT id FROM tbricks WHERE title='".$strTitle."'");
		// If result is empty
		//if ($data == false) {
		if (empty($data)) {
			return 0;
		} else {
			$array = array();
			foreach ($data as $row) {
				array_push($array, $row['id']);
			}
			$id= intval($array[0]);
			return $id;
		}
	}

	/**
	 * Erase a brick from database
	 */
	public function delete($iID){
		$data = $this->db->query("DELETE FROM `tbricks` WHERE id='".$iID."'");
		return $data;
	}

}
