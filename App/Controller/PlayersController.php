<?php
use App\Core\Controller\Controller;

class PlayersController extends Controller
{

    public function index()
    {
        $this->view->render('players/index');
    }

    public function save()
    {

    }

    public function savesound()
    {
        if(!is_dir("recordings")){
            $res = mkdir("recordings",0777);
        }
        $data = substr($_POST['data'], strpos($_POST['data'], ",") + 1);
        $data = $_POST['data'];
        var_dump($data);
// decode it
        $decodedData = base64_decode($data);
        $filename = urldecode($_POST['file']);
        $fp = fopen($decodedData, 'w+');
        fwrite($fp, '/recordings/'.$filename);
        fclose($fp);
    }

    public function soundLayout()
    {
        $this->view->load_layout('players/sound');
    }

    public function ttsLayout()
    {
        $this->view->load_layout('players/tts');
    }

    public function txtLayout()
    {
        $this->view->load_layout('players/txt');
    }

    public function recordLayout()
    {
        $this->view->load_layout('players/record');
    }

    public function imgLayout()
    {
        $this->view->load_layout('players/img');
    }


}