<?php
use App\Core\Controller\Controller;
class PlayersController extends Controller
{
    public function sound()
    {
        $this->view->render('sequences/sound');
    }
    public function tts() {
        $this->view->render('sequences/tts');
    }
}