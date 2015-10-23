<?php 

class Sequence extends Model{

	public function __construct(){
		parent::__construct();
	}

	public function create(array $sequence){
		$this->db->query("INSERT INTO sequences (title, duration) VALUES ('".$sequence['title']."', '".$sequence['duration'].")");
	}

	public function findById($id){
		$this->db->query("SELECT * FROM sequences WHERE id='$id");
	}

	public function update(array $sequence){
		$this->db->query("UPDATE sequences (title, duration) VALUES ('".$sequence['title']."', '".$sequence['duration'].")");
	}

	public function delete($id){
		$this->db->query("DELETE FROM sequences WHERE id=".$id");
	}

}
