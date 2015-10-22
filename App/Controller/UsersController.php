<?php
use App\Core\Session;

use App\Core\Controller\Controller;
use App\Core\Request;
use App\Core\View\View;
use App\Core\Validator;



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
     * Accueil de la partie user et gestion de la connexion
      */
    public function index()
    {
			  $user = Request::all();
         
				
        if (isset($_SESSION['user'])) {
            //$lessons = $this->Lesson->findToDo();
            //$this->view->lessons = $lessons;
            $username = Session::get('user');
            $this->view->username = $username;
            $this->view->render('users/index');
		    
        } elseif (!Validator::array_has_empty($user)) {

            // Si les champs ont été remplis 
         
                if ($user = $this->User->fetchValidUser($user))
				{

                    // Création de la session                 
                    Session::set('user', $user['lastName']);
                    $this->setFlash("Vous êtes connecté !", 'success');
                    
                    // Redirection en fonction des roles
                    if ($user['role'] == "admin") {
											 $this->view->render('/user/admin_index');
                    } else {
						 $this->view->user = Session::get('lastName');
						 $this->view->render('user/index');
					}

                }
				else {
                    $this->setFlash("L'email et le mot de passe ne correspondent pas", 'danger');
                    $this->view->redirect_to('/');
                }
           
        }
		else {
            $this->setFlash("Vous devez vous connecter avant de pouvoir acceder à cette partie", 'danger');
            $this->view->render('users/connect');
        }
    }


    /*
     * Fonction d'inscription
     * $this->User->register($_POST['user']);
     */
    public function register()
    {
        $data = Request::all();
        // Si tous les champs ont été remplis
        if (isset($_POST['user'])) {
            if (isset($_POST['user']['mail']) &&
                isset($_POST['user']['password']) &&
                isset($_POST['user']['password2']) &&
                isset($_POST['user']['firstName']) &&
                isset($_POST['user']['lastName'])
            ) {
                // Si le password et la confirmation sont identiques
                if ($_POST['user']['password'] == $_POST['user']['password2']) {

                    // Si l'email existe déjà dans la db -> erreur
                    if ($this->User->findByMail($_POST['user']['mail'])) {
                        $this->setFlash("Un utilisateur utilise déjà cet e-mail", 'warning');
                        $this->view->render('users/register');
                    } // Sinon on crée l'utilisateur et on le redirige vers l'index
                    else {
                        $this->User->create($_POST['user']);
                        $this->setFlash("Votre inscription a bien été prise en compte", 'success');
                        //$this->login();
                        $this->view->redirect_to('/');
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

    /**
     * Accueil de la partie administrateur
     */
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
        Session::destroy('user');
        $this->setFlash("Vous êtes bien deconnecté", 'success');
        //$this->view->render('index/index');
        $this->view->redirect_to('/');
    }

    /*
     * Fonction de récuperation de mot de passe
     */
    public function recovery()
    {

        $this->view->render('users/recovery');
    }

    public function admin_brick()
    {

    }

    public function admin_users()
    {
        $this->view->render('users/admin/userslist');
    }

    public function admin_lessons()
    {

    }

}
