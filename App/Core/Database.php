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
	 * @return array|bool -> Array si SELECT, sinon BOOL en fonction de succès requête
	 * Exemple : query('SELECT * FROM table WHERE field = %field%', array('field' => $value));
	 */

	public function query($sqlRequest, array $data = null)
	{
		if ($data != null) {
			foreach ($data AS $key => $value) {
				$sqlRequest = str_replace('%'.$key.'%', $this->getPDO()->quote($value), $sqlRequest);
			}
		}
		$type = explode(' ', $sqlRequest);
		if ($type[0] == 'SELECT') {
			$request = $this->getPDO()->query($sqlRequest);
			$data = $request->fetchAll(\PDO::FETCH_ASSOC);
			return $data;
		} elseif ($type[0] == 'DELETE') {
			$request = $this->getPDO()->exec($sqlRequest);
			return ($request != FALSE);
		} else{
			$request = $this->getPDO()->exec($sqlRequest);
			return ($request != FALSE);
		} 

	 }
}