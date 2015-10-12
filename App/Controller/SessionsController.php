<?php

use App\Core\Controller\Controller;
use App\Core\View\View;

/* Generated from GenMyModel */

class SessionsController extends Controller{
	private $sessionModel;
	
	public function __construct()
	{
	    parent::__construct();
		$this->sessionModel = $this->loadModel("Session");
	}
	
	/* Prototype : CreateSession() */
	/* Description :  */
	/* Parameters : */
	/* Return : */
	
	public function index()
	{
		$this->view->render("sessions/index");
	}
	
    public function CreateSession()
    {
        $result = 0;
        
        return $result;
    }

	/* Prototype : ReadSession() */
	/* Description :  */
	/* Parameters : */
	/* Return : */
    public function ReadSession()
    {
        $result = null;
        
        return $result;
    }

	/* Prototype : UpdateSession() */
	/* Description :  */
	/* Parameters : */
	/* Return : */
    public function UpdateSession()
    {
        $result = null;
        
        return $result;
    }

	/* Prototype : DeleteSession() */
	/* Description :  */
	/* Parameters : */
	/* Return : */
    public function DeleteSession()
    {
        $result = null;
        
        return $result;
    }

	/** Charge la vue d'edition
	 *
     */
	public function edit() {
		$this->view->render('sessions/edit');
	}


	/** Charge la vue de suppresion
	 *
     */
	public function delete() {
		$this->view->render('sessions/delete');
	}
}
