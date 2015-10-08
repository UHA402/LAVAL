<?php
use App\Core\Controller\Controller;
use App\Core\View\View;
session_start();

/*
 *  Gestion de la logique utilisateur
 */
class UsersController extends Controller {
	// Chargement des models

	function __construct(){
		parent::__construct();
	}

	/*
	 * Fonction de connection
	 */
	public function login() {
		if (isset($_POST['user'])) {
			if (isset($_POST['user']['mail']) && isset($_POST['user']['password'])) {
				$user = $this->User->fetchValidUser($_POST['user']);
				$_SESSION['user'] = $user;
				$msg = "Vous êtes connecté !";
				$this->view->msg = $msg;

				if ($user['role'] == "admin") {
					$this->admin_index();
				}
				else {
					$this->index();
				}

			} else {
				$msg = "L'email et le mot de passe ne correspondent pas";
				$this->view->msg;
				$this->view->render('/users/login');
			}
		} else {
			$this->view->render('/users/login');
		}
	}

	/*
	 * Fonction d'inscription
	 * $this->User->register($_POST['user']);
	 */
	public function register() {
		$msg = null;
		if (isset($_POST['user'])) {
			if (isset($_POST['user']['mail']) &&
				isset($_POST['user']['password']) &&
				isset($_POST['user']['password2']) &&
				isset($_POST['user']['firstName']) &&
				isset($_POST['user']['lastName'])) {
				if ($_POST['user']['password'] == $_POST['user']['password2']) {
					if($this->User->findByMail($_POST['user']['mail'])) {
						$msg = "Un utilisateur utilise déjà cet e-mail";
						$this->view->msg = $msg;
						$this->view->render('users/register');
					}
					else {
						$this->User->create($_POST['user']);
						$msg = "Votre inscription a bien été prise en comtpe";
						$this->view->msg = $msg;
						$this->login();
					}

				} else {
					$msg = "Les mots de passes renseignés ne sont pas identiques";
					$this->view->msg = $msg;
					$this->view->render('users/register');
				}

			} else
			{
				$msg = "Veuillez renseigner tous les champs";
				$this->view->msg = $msg;
				$this->view->render('users/register');
			}
		} else {
			$this->view->render('users/register');
		}
	}

	/*
	 * Accueil de la partie user
 	 */
	public function index(){
		if (isset($_SESSION['user'])) {
			//$lessons = $this->Lesson->findToDo();
			//$this->view->lessons = $lessons;
			$username = $_SESSION['user']['firstName'];
			$this->view->username = $username;
			$this->view->render('users/index');
		} else {
			$msg = "Vous devez vous connecter avant de pouvoir acceder à cette partie";
			$this->view->msg = $msg;
			$this->view->render('users/index');
		}
	}

	public function admin_index(){
		if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "admin") {
				$username = $_SESSION['user']['firstName'];
				$this->view->username = $username;
				$this->view->render('users/admin/index');
			} else {
				$msg = "Vous devez vous connecter avant de pouvoir acceder à cette partie";
				$this->view->msg = $msg;
				$this->view->render('users/index');
			}
	}

	/*
	 * Fonction de déconnection
	 * envoi une variable $msg à la vue
	 */

	public function logout() {
		session_destroy();
		$msg = "Vous êtes bien deconnecté";
		$this->view->msg = $msg;
		$this->view->render('index/index');
	}

	/*
	 * Fonction de récuperation de mot de passe
	 */
	public function recovery() {
	}

}