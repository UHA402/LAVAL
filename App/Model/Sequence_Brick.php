<?php
use App\Core\Model\Model;

class Sequence_Brick extends Model{
	public function __construct(){
	        parent::__construct('sequences _bricks');
	}

	public function save($sequence_id, $bricks_id){
		$this->db->query("INSERT INTO sequences_bricks (sequence_id, bricks_id) VALUES ('".$sequence_id."', '".$bricks_id."')");
	}
}