<?php
use App\Core\Controller\Controller;
use App\Core\View\View;

/*
 *  Gestion de la logique utilisateur
 */

class UsersController extends Controller
{
	// Chargement des models

	function __construct()
	{
		parent::__construct();
	}

	/*
	 * Fonction de connection
	 */
	public function login()
	{
		if (isset($_SESSION['user'])) {
			$this->setFlash('Vous êtes déjà connecté', 'warning');
			header('Location: /user/index');
			exit();
		}
		if (isset($_POST['user'])) {
			// Si les champs ont été remplis
			if (isset($_POST['user']['mail']) && isset($_POST['user']['password'])) {

				// Vérification dans la DB
				if ($user = $this->User->fetchValidUser($_POST['user'])) {

					// Création de la session
					$_SESSION['user'] = $user;
					$this->setFlash("Vous êtes connecté !", 'success');

					// Redirection en fonction des roles
					if ($user['role'] == "admin") {
						header('Location: /user/admin_index');
						exit();
					} else {
						header('Location: /user/index');
						exit();
					}
				} else {
					$this->setFlash("L'email et le mot de passe ne correspondent pas", 'danger');
					$this->view->render('/users/login');
				}
			}
		} else {
			$this->view->render('/users/login');
		}
	}

	/*
	 * Fonction d'inscription
	 * $this->User->register($_POST['user']);
	 */
	public function register()
	{
		if (isset($_POST['user'])) {
			if (isset($_POST['user']['mail']) &&
				isset($_POST['user']['password']) &&
				isset($_POST['user']['password2']) &&
				isset($_POST['user']['firstName']) &&
				isset($_POST['user']['lastName'])
			) {
				if ($_POST['user']['password'] == $_POST['user']['password2']) {
					if ($this->User->findByMail($_POST['user']['mail'])) {
						$this->setFlash("Un utilisateur utilise déjà cet e-mail", 'warning');
						$this->view->render('users/register');
					} else {
						$this->User->create($_POST['user']);
						$this->setFlash("Votre inscription a bien été prise en compte", 'success');
						//$this->login();
						header('Location: /user/login');
						exit();
					}

				} else {
					$this->setFlash("Les mots de passes renseignés ne sont pas identiques", 'warning');
					$this->view->render('users/register');
				}

			} else {
				$this->setFlash("Veuillez renseigner tous les champs", 'warning');
				$this->view->render('users/register');
			}
		} else {
			$this->view->render('users/register');
		}
	}

	/*
	 * Accueil de la partie user
 	 */
	public function index()
	{
		if (isset($_SESSION['user'])) {
			//$lessons = $this->Lesson->findToDo();
			//$this->view->lessons = $lessons;
			$username = $_SESSION['user']['firstName'];
			$this->view->username = $username;
			$this->view->render('users/index');
		} elseif (isset($_POST['user'])) {

			// Si les champs ont été remplis
			if (isset($_POST['user']['mail']) && isset($_POST['user']['password'])) {

				// Vérification dans la DB
				if ($user = $this->User->fetchValidUser($_POST['user'])) {

					// Création de la session
					$_SESSION['user'] = $user;
					$this->setFlash("Vous êtes connecté !", 'success');

					// Redirection en fonction des roles
					if ($user['role'] == "admin") {
						header('Location: /user/admin_index');
						exit();

					} else {
						header('Location: /user/index');
						exit();
					}
				} else {
					$this->setFlash("L'email et le mot de passe ne correspondent pas", 'danger');
					$this->view->render('/users/login');
				}
			}
		} else {
			$this->view->render('index/index');
			$this->setFlash("Vous devez vous connecter avant de pouvoir acceder à cette partie", 'danger');
			//header('Location: /user/login'); exit();
			$this->view->render('users/login');
		}
	}

	public function admin_index()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "admin") {
			$username = $_SESSION['user']['firstName'];
			$this->view->username = $username;
			$this->view->render('users/admin/index');
		} else {
			$this->setFlash("Vous devez être administrateur pour pouvoir acceder à cette partie", 'danger');

			//header('Location: /user/login'); exit();
			$this->view->render('users/login');
		}
	}

	/*
	 * Fonction de déconnection
	 * envoi une variable $msg à la vue
	 */

	public function logout()
	{
		unset($_SESSION['user']);
		$this->setFlash("Vous êtes bien deconnecté", 'success');
		//$this->view->render('index/index');
		header('Location: /');
		exit();
	}

	/*
	 * Fonction de récuperation de mot de passe
	 */
	public function recovery()
	{
	}

	public function admin_brick()
	{

	}

	public function admin_users()
	{

	}

	public function admin_lessons()
	{

	}

}