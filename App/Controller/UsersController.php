<?php
use App\Core\Session;
use App\Core\Request\Request;
use App\Core\Controller\Controller;
use App\Core\View\View;
use App\Core\Validator;

/*
 *  Logique utilisateur
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
    public function index(){
	$user = Request::all();
	if (isset($_SESSION['user'])) {
            $username = $_SESSION['user']['firstName'];
            $this->view->username = $username;
            $this->view->render('users/index');
		    
            } elseif (!Validator::array_has_empty($user)) {

            // Si les champs ont été remplis 
         
                if ($user = $this->User->fetchValidUser($user)){
                    // Création de la session                 
                    Session::set('user', $user);
                    $this->setFlash("Vous êtes connecté !", 'success');
                    
                    // Redirection en fonction des roles
                    if ($user['role'] == "admin") {
                    		$this->view->redirect_to('/user/admin_index');
                    } else {
			 $this->view->username = $_SESSION['user']['firstName'];
			 $this->view->redirect_to('/user/index');
		}
                } else {
                    $this->setFlash("L'email et le mot de passe ne correspondent pas", 'danger');
                    $this->view->redirect_to('/');
                }
        } else {
            $this->setFlash("Vous devez vous connecter avant de pouvoir acceder à cette partie", 'danger');
            $this->view->render('users/connect');
        }
    }

            /*
	 * Fonction d'inscription
	 * $this->User->register($data);
	 */
public function register()
{
   $data = Request::all();
   // Si tous les champs ont été remplis
   	if (!Validator::array_has_empty($data)) {
   		// Si le password et la confirmation sont identiques
   		if ($data['password'] == $data['password2']) {

   			// Si l'email existe déjà dans la db -> erreur
   			if ($this->User->findByMail($data['mail'])) {
   				$this->setFlash("Un utilisateur utilise déjà cet e-mail", 'warning');
   				$this->view->render('users/register');
   			}
   			// Sinon on crée l'utilisateur et on le redirige vers l'index
   			else {

   				$this->User->save($data);
                            $_SESSION['user'] = $data;
                            $_SESSION['user']['role'] = "member";
                            unset($_SESSION['user']['password'], $_SESSION['user']['password2']);
   				$this->setFlash("Votre inscription a bien été prise en compte", 'success');
   				//$this->login();
   				$this->view->redirect_to('/user/index');
   			}

   		} else {
   			$this->setFlash("Les mots de passes renseignés ne sont pas identiques", 'warning');
   			$this->view->render('users/register');
   		}

   	} elseif($data && Validator::array_has_empty($data)) {
                  $this->setFlash("Veuillez renseigner tous les champs", 'warning');
                  $this->view->render('users/register');

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
