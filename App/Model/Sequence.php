<?php 
use App\Core\Model\Model;

class Sequence extends Model{

	public function __construct(){
		parent::__construct('tsequences');
	}

	public function create(array $sequence){
		$this->db->query("INSERT INTO tsequences (title, duration) VALUES ('".$sequence['title']."', '".$sequence['duration']."')");
	}

	public function findById($id){
		$data = $this->db->query("SELECT * FROM tsequences WHERE id='".$id."'");
		return $data;
	}

	public function findAll(){
		$data = $this->db->query("SELECT * FROM tsequences");
		return $data;
	}

	public function findAllBricks(){
		$data = $this->db->query("SELECT * FROM tbricks");
		return $data;
	}

	public function findSequenceBricks($sequence_id){
		$data = $this->db->query("SELECT * FROM tbricks INNER JOIN tsequences_bricks ON tbricks.id = sequences_bricks.bricks_id WHERE id='".$id."'");
		return $data;
	}

	public function update(array $sequence){
		$this->db->query("UPDATE sequences (title, duration) VALUES ('".$sequence['title']."', '".$sequence['duration'].")");
	}

	public function delete($id){
		$this->db->query("DELETE FROM sequences WHERE id='".$id."'");
	}

}
