<?php namespace App\Core\Database;


/*
* Classe de configuration de 
* la connection à la base de donnée
* 
* S'utilise de cette manière : 
* $database = new Database("nom de la database", "username", "password", "host");
* $data = $database->query("REQUETE SQL");
*
*/

class Database{ 

	private $database;
	private $user;
	private $pass;
	private $host;
	private $pdo;

	public function __construct($database, $user = 'root', $pass = '', $host = 'localhost'){
		/*parent::__construct($database, $user = 'root', $pass = '', $host = 'localhost');
		parent::setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);*/
		$this->database = $database;
		$this->user = $user;
		$this->pass = $pass;
		$this->host = $host;
 
	 }

	 private function getPDO(){
	 	$pdo = $this->pdo;
	 	//Connection à la database
	 	if ($pdo === null){ // Si on a pas encore d'objet PDO (on est pas connecté)
		 	$pdo = new \PDO('mysql:dbname='.$this->database.';host='.$this->host.';charset=UTF8', $this->user, $this->pass); // Alors on se connecte
		 	if($this->host == 'localhost'){ // Si on est en dev
		 		$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING); // Alors on renvoi des erreurs
		 	}
	 		$this->pdo = $pdo;
	 	}
	 	return $this->pdo;
	 }

	 public function query($sqlRequest){ 
	 // Effectue la requete SQL définie et retourne un array

	 	$request = $this->getPDO()->query($sqlRequest);
	 	$data = $request->fetchAll(\PDO::FETCH_ASSOC);
	 	return $data;
	 }

	/*
	 * Idées d'amélioration
	 * 1. Ajouter des fonctions save(), find()
	 * 2. Utiliser un fichier de config pour stocker et les infos de 
	 * la database et les récupérer en valeurs par défaut dans l'objet
	 */

} 