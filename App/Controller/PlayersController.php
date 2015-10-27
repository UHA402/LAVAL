<?php
use App\Core\Controller\Controller;

class PlayersController extends Controller
{

    public function index()
    {
        $this->view->render('players/index');
    }
    public function soundLayout()
    {
        $this->view->load_layout('players/sound');
    }

    public function ttsLayout() {
        $this->view->load_layout('players/tts');
    }

    public function txtLayout(){
        $this->view->load_layout('players/txt');
    }


}