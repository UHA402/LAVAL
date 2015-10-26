<?php 
use App\Core\Model\Model;

class Sequence extends Model{

	public function __construct(){
		parent::__construct("sequences");
	}

	public function findById($id){
		$data = $this->db->query("SELECT * FROM sequences WHERE id='".$id."'");
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

	// public function update(array $sequence){
	// 	$this->db->query("UPDATE sequences (title, duration) VALUES ('".$sequence['title']."', '".$sequence['duration'].")");
	// }

	public function delete($id){
		$this->db->query("DELETE FROM sequences WHERE id='".$id."'");
	}

}
