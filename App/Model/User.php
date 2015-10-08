<?php
use App\Core\Model\Model;
/*
 * Gestion des données utilisateur
 */
class User extends Model{

	public function __contruct(){
		parent::__construct();
	}

	/*
	 * Enregistre un utilisateur en base de donnée
	 */

	public function create(array $user){
		$this->db->query("INSERT INTO users (firstName, lastName, mail, password) VALUES ('".$user['firstName']."', '".$user['lastName']."', '".$user['mail']."', '".md5($user['password'])."')");
	}

	/*
	 * Fonction de modification d'un utilisateur*
	 * $this->update($_POST['user']);
	 */

	public function update(array $user){
		$this->db->query("UPDATE users (firstName, lastName, mail, password) VALUES ('".$user['firstName']."', '".$user['lastName']."', '".$user['mail']."', '".md5($user['password'])."')");
	}

	/*
	 * Valide l'email et le mot de passe d'un utilisateur pour la connexion
	 * Utilisation : User->fetchValidUser($_POST['user'])
	 */

	public function fetchValidUser(array $user) {
		$data = $this->db->query("SELECT * FROM users WHERE mail = '".$user["mail"]."' AND password = '".md5($user['password'])."'");
		return ($data)? $data : false;
	}

	/*
	 * Trouve un utilisateur en fonction de son mail
	 * Utilisation : User->findByMail(mail)
	 */

	public function findByMail($mail){
		$data = $this->db->query("SELECT * FROM users WHERE mail='$mail'");
		return $data;
	}

	/*
	 * Trouve l'utilisateur actuellement connecté
	 * Utilisation : User->findCurrent($_SESSION['user'])
	 */

	public function findCurrent(array $user){
		$data = $this->db->query('SELECT * FROM users WHERE id='.$user['id']);
		return $data; 
	}

	/*
	 * Supprime un utilisateur
	 * Utilisation : User->delete(25)
	 */

	private function delete($id){
		$this->db->query("DELETE FROM users WHERE id=".$id);
	}
}