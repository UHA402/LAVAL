<?php


use App\Core\Controller\Controller;

class SessionsController extends Controller
{

    public function index() {
        echo 'sessions/index';
    }

    public function edit() {
        $this->view->render('sessions/edit');
    }

    public function delete() {
        $this->view->render('sessions/delete');
    }

}