<?php 
use App\Core\Model\Model;
use App\Core\Request\Request;
class Sequence extends Model{

	public function __construct(){
		parent::__construct("sequences");
	}

	public function countBricks($sequence_id){
		$data = $this->db->query("SELECT COUNT(*) FROM sequence_brick WHERE id = ".$sequence_id);
		return intval($data[0]["COUNT(*)"]);
	}

	public function findById($id){
		$request = "SELECT * FROM sequences WHERE";
		if (is_array($id)) {
			$lenght = count($id);
			foreach ($id as $key => $i) {
				if ($key == $lenght-1 ) {
					$request .= "id = ".$i;
				} else {
					$request .= "id = ".$i." OR ";
				}
			}
		} else {
			$request .= "id = ".$id;
		}
		$data = $this->db->query($request);
		return $data;
	}

	public function findAll(){
		$data = $this->db->query("SELECT * FROM sequences");
		return $data;
	}

	public function findAllBricks(){
		$data = $this->db->query("SELECT * FROM tbricks");
		return $data;
	}

	public function findSequenceBricks($sequence_id){
		$data = $this->db->query("SELECT * FROM tbricks INNER JOIN sequences_bricks ON tbricks.id = sequences_bricks.bricks_id WHERE id='".$id."'");
		return $data;
	}

	public function findLastId(){
		$lastId = $this->db->query("SELECT MAX(id) FROM sequences");
		$data = Request::cleanInput($lastId);
		return intval($data["MAX(id)"]);
	}

	// public function update(array $sequence){
	// 	$this->db->query("UPDATE sequences (title, duration) VALUES ('".$sequence['title']."', '".$sequence['duration'].")");
	// }
	public function delete($id){
		$this->db->query("DELETE FROM sequences WHERE id='".$id."'");
	}
}
