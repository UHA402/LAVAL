<?php
use App\Core\Model\Model;

class Sequence_Brick extends Model{
	public function __construct(){
	        parent::__construct('sequences _bricks');
	}

	/**
	 * Find the sequence bricks by sequence id
	 */
	public function findBySeqId($sequence_id){
		$data = $this->db->query('SELECT * from sequences_bricks WHERE sequence_id ='.$sequence_id);
		return $data;
	}

	/**
	 * Save the bricklist in database
	 * @param  int $sequence_id
	 * @param  int $bricks_id
	 */
	public function save($sequence_id, $bricks_id){
		$this->db->query("INSERT INTO sequences_bricks (sequence_id, bricks_id) VALUES ('".$sequence_id."', '".$bricks_id."')");
	}

	/**
	 * Edit the bricklist
	 * @param  int $id
	 * @param  int $sequence_id
	 * @param  string $bricks_id   bricklist
	 */
	public function edit($id, $sequence_id, $bricks_id){
		$sql = "UPDATE sequences_bricks SET sequence_id = '".$sequence_id."', bricks_id = '".$bricks_id."' WHERE id = ".$id;
		$this->db->query($sql);
	}
}
