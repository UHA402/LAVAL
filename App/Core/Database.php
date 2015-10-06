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

class Database
{

	private $database;
	private $user;
	private $pass;
	private $host;
	private $pdo;

	public function __construct($database, $user = 'root', $pass = '', $host = 'localhost')
	{
		/*parent::__construct($database, $user = 'root', $pass = '', $host = 'localhost');
		parent::setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);*/
		$this->database = $database;
		$this->user = $user;
		$this->pass = $pass;
		$this->host = $host;

	}

	private function getPDO()
	{
		$pdo = $this->pdo;
		//Connection à la database
		if ($pdo === null) { // Si on a pas encore d'objet PDO (on est pas connecté)
			$pdo = new \PDO('mysql:dbname=' . $this->database . ';host=' . $this->host . ';charset=UTF8', $this->user, $this->pass); // Alors on se connecte
			if ($this->host == 'localhost') { // Si on est en dev
				$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING); // Alors on renvoi des erreurs
			}
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	/**
	 * Envoie une requête dans la DB, avec possibilité d'intégrer
	 * des variables, qui seront échappées
	 * @param $sqlRequest = Requête SQL à exécuter
	 * @param array $data = [OPTIONNEL] Données à insérer dans la requête
	 * @return array|bool -> Array si SELECT, sinon BOOL
	 * Exemple : query('SELECT * FROM table WHERE field = %field%', array('field' => $value));
	 */
	public function query($sqlRequest, array $data = null)
	{
		if ($data != null) {
			foreach ($data AS $key => $value) {
				$sqlRequest = str_replace('%'.$key.'%', $this->getPDO()->quote($value), $sqlRequest);
			}
		}

	 	$request = $this->getPDO()->query($sqlRequest);

		$type = explode(' ', $sqlRequest);
		if ($type[0] == 'SELECT') {
			$data = $request->fetchAll(\PDO::FETCH_ASSOC);
			return $data;
		}
		else return ($request != FALSE);
	 }

	/*
	public function find(array $params)
	{
		$params = array('name' => 'NOM');
		$requete = 'SELECT * FROM bricks WHERE brick_name = %name%';
	}

	$sql->query('SELECT * FROM bricks WHERE brick_name = %name%');*/

	public function save($sqlRequest, $type = "find")
	{
		// Effectue la requete SQL définie et retourne un array

		$request = $this->getPDO()->query($sqlRequest);
		if ($type == "find") {
			# code...
		}
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