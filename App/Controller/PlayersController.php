<?php
use App\Core\Controller\Controller;
use App\Core\Request\Request;
class PlayersController extends Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->loadModel("session");
        $this->loadModel("sequence");
        $this->loadModel("brick");
    }
    
    public function index()
    {
        if ($this->verifConnexion())
        {
            if (isset($_SESSION['user'])) {
                $this->view->render('players/index');
            } else {
                $this->setFlash("You need to be connected to access in this page", 'danger');
                $this->view->render('users/connect');
            }
        }
    }
    
    public function start($id)
    {
        if ($this->verifConnexion())
        {
            $sessionTitle = $this->Session->ReadTitleSession($id);
            $sessionTabSequence = $this->Session->ReadLessonsSession($id);
            $sequenceTabBrick = array();
            
            //var_dump($sessionTitle);
            //echo '</br>';
            //var_dump($sessionTabSequence);
            //echo '</br>';
            
            foreach ($sessionTabSequence as $id=>$seq)
            {
                $sequence = $this->Sequence->findById(intval($seq));
                $temp = $this->Sequence->findSequenceBricks(intval($seq));
            
                //var_dump(intval($seq));
                //echo '</br>';
                //var_dump($sequence);
                //echo '</br>';
                //var_dump($temp);
                //echo '</br>';
                foreach ($temp as $id=>$val)
                    array_push($sequenceTabBrick, $val);
            }
            
            /*foreach($sequenceTabBrick as $id=>$val)
            {
                var_dump($val);
                echo '</br>';
            }*/
            
            $_SESSION["playerTabBrick"] = $sequenceTabBrick;
            $this->view->msg = json_encode($sequenceTabBrick);
            $this->view->render('players/index');
        }
    }
    
    public function save()
    {
        if ($this->verifConnexion())
        {
            $OSList = array
            (
                            'Windows 3.11' => 'Win16',
                            'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
                            'Windows 98' => '(Windows 98)|(Win98)',
                            'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
                            'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
                            'Windows Server 2003' => '(Windows NT 5.2)',
                            'Windows Vista' => '(Windows NT 6.0)',
                            'Windows 7' => '(Windows NT 7.0)',
                            'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
                            'Windows ME' => 'Windows ME',
                            'Open BSD' => 'OpenBSD',
                            'Sun OS' => 'SunOS',
                            'Linux' => '(Linux)|(X11)',
                            'Mac OS' => '(Mac_PowerPC)|(Macintosh)',
                            'QNX' => 'QNX',
                            'BeOS' => 'BeOS',
                            'OS/2' => 'OS/2',
                            'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)'
            );
            // Loop through the array of user agents and matching operating systems
            foreach($OSList as $CurrOS=>$Match)
            {
                    // Find a match
                    if (mb_ereg($Match, $_SERVER['HTTP_USER_AGENT']))
                    {
                            // We found the correct match
                            break;
                    }
            }
            // if it is audio-blob
            //var_dump($_FILES);
            if (isset($_FILES["audio-blob"])) {
                    $uploadDirectory = 'public/uploads/'.$_POST["filename"].'.wav';
                    if (!move_uploaded_file($_FILES["audio-blob"]["tmp_name"], $uploadDirectory)) {
                            echo("Problem writing audio file to disk!");
                    }

            }
            
            echo json_encode($_POST);
            //$this->view->load_layout('players/index');
        }
    }

    public function soundLayout()
    {
        if ($this->verifConnexion())
        {
            $this->view->load_layout('players/sound');
        }
    }

    public function ttsLayout()
    {
        if ($this->verifConnexion())
        {
            $this->view->load_layout('players/tts');
        }
    }

    public function txtLayout()
    {
        if ($this->verifConnexion())
        {
            $this->view->load_layout('players/txt');
        }
    }

    public function recordLayout()
    {
        if ($this->verifConnexion())
        {
            $this->view->load_layout('players/record');
        }
    }
    
    public function registerSound(){
        if ($this->verifConnexion())
        {
            
        }
    }

    public function imgLayout()
    {
        if ($this->verifConnexion())
        {
            $this->view->load_layout('players/img');
        }
    }
}