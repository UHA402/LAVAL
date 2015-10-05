<?php
use App\Core\Controller\Controller;
use App\Core\View\View;

/*
 *  Gestion de la logique utilisateur
 */
class UsersController extends Controller {

	function __construct(){
		parent::__construct();
	}

	/*
	 * Fonction de connection
	 */ 

	public function login() {
		$msg = null;
		if (isset($_POST['user'])) {
			if (isset($_POST['user']['mail']) && isset($_POST['user']['password'])) {
				$user = $this->User->fetchValidUser($_POST['user']);
				$_SESSION['user'] = $user;
				$msg = "Vous êtes connecté !";
				$this->view->render('users/home');
			} else $msg = "L'email et le mot de passe ne correspondent pas";
		} else $msg = "Il n'y a pas de données postées";
		$this->view->msg = $msg;
	}

	/*
	 * Fonction de déconnection
	 * envoie une variable $msg à la vue
	 */

	public function logout() {
		session_destroy();
		$msg = "Vous êtes bien deconnecté";
		$this->view->msg = $msg;
		$this->view->render('logout');

	}

	/*
	 * Fonction d'inscription
	 * $this->User->register($_POST['user']);
	 */

	public function register() {
		$msg = null;
		var_dump($_POST);
		if (isset($_POST['user'])) {
			if (isset($_POST['user']['mail']) && 
			isset($_POST['user']['password']) && 
			isset($_POST['user']['password2']) && 
			isset($_POST['user']['firstName']) && 
			isset($_POST['user']['lastName'])) {
				if ($_POST['user']['password'] == $_POST['user']['password2']) {
					$this->User->create($_POST['user']);
					$msg = "Votre inscription a bien été prise en comtpe";

				} else $msg = "Les mots de passes renseignés ne sont pas identiques";

			} else $msg = "Veuillez renseigner tous les champs";

		} else $msg = "Il n'y a pas de données postées";
		$this->view->msg = $msg;
		$this->view->render('users/home');
	}

	public function recovery() {
	}

	public function home() {
	}

	/*
	 * Pour le mini test
	 */

	public function getUser() {
		$erreur = false;
		$user = false;
		if (isset($_POST['mail'])) {
			if (strlen($_POST['mail']) >= 6) {
				if ($this->User->check($_POST['mail'])) {
					$user = $this->User->check($_POST['mail']);
				}
				else $erreur = 'Le mail n\'a pas été trouvé dans la DB';
			}
			else $erreur = 'Le mail est trop court';
		}
		else $erreur = 'Entrez le mail SVP';
		$this->view->erreur = $erreur;
		$this->view->user = $user;
		$this->view->render('users/index');
	}
}