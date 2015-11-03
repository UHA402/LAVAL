<?php
use App\Core\Model\Model;

class Sequence_Brick extends Model{
	public function __construct(){
	        parent::__construct('sequences _bricks');
	}

	public function findBySeqId($sequence_id){
		$data = $this->db->query('SELECT * from sequences_bricks WHERE sequence_id ='.$sequence_id);
		return $data;
	}

	public function save($sequence_id, $bricks_id){
		$this->db->query("INSERT INTO sequences_bricks (sequence_id, bricks_id) VALUES ('".$sequence_id."', '".$bricks_id."')");
	}

	public function edit($id, $sequence_id, $bricks_id){
		$sql = "UPDATE sequences_bricks SET sequence_id = '".$sequence_id."', bricks_id = '".$bricks_id."' WHERE id = ".$id;
		$this->db->query($sql);
	}
}
