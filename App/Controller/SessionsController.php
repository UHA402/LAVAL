<?php
use App\Core\Controller\Controller;
use App\Core\View\View;

/* Generated from GenMyModel */

class SessionsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("sequence");
    }

    public function index($iID = null)
    {
        if ($this->verifConnexion())
        {
            if (count($iID) === 0)
            {
                    $this->defaultSessionInformation();
                    $this->view->render("sessions/index");
            }
            else
            {
                    $title = $this->Session->ReadTitleSession(intval($iID[0]))[0]["title"];
                    $this->defaultSessionInformation("", "", intval($iID[0]), $title);
                    $this->view->render("sessions/index");
            }
        }
    }

    public function edit($id = null)
    {
        if ($this->verifConnexion())
        {
            if ($id === null)
            {
                    $this->defaultSessionInformation();
            }
            else
            {
                    $title = $this->Session->ReadTitleSession(intval($id));
                    $this->defaultSessionInformation("", "", intval($id), $title);
            }

            $this->view->render("sessions/edit");
        }
    }

    public function readSequenceById()
    {
        if ($this->verifConnexion())
        {
            if (isset($_POST['idAddSequence']))
            {
                    $tabStrId = explode(',', $_POST['idAddSequence']);
                    $tabId = array();

                    foreach ($tabStrId as $id=>$strId)
                            $tabId[$id] = intval($strId);

                    if (count($tabId) > 1)
                    {
                            for ($i = 0; $i < count($tabId); $i++)
                            {
                                    $sequence = $this->Sequence->findById($tabId[$i]);
                                    $tab[$i]['id'] = $sequence[0]['id'];
                                    $tab[$i]['title'] = $sequence[0]['title'];
                                    $tab[$i]['publish'] = $sequence[0]['publish'];
                                    $tab[$i]['duration'] = $sequence[0]['duration'];
                                    $tab[$i]['nbBrick'] = $this->Sequence->countBricks($tabId[$i]);
                            }
                            
                            echo json_encode($tab);
                    }
                    else
                    {
                            $sequence = $this->Sequence->findById($tabId);
                            $tab[0]["id"] = $sequence[0]['id'];
                            $tab[0]['title'] = $sequence[0]['title'];
                            $tab[0]['publish'] = $sequence[0]['publish'];
                            $tab[0]['duration'] = $sequence[0]['duration'];
                            $tab[0]['nbBrick'] = $this->Sequence->countBricks($tabId[0]);
                            echo json_encode($tab);
                    }
            }
        }
    }

    public function readTabSequence()
    {
        if ($this->verifConnexion())
        {
            $idSession = intval($_POST['idSession']);
            $session = $this->ReadSession($idSession);
            $result = array();

            $title = $this->Session->ReadTitleSession($idSession);
            $this->defaultSessionInformation("", "", $idSession, $title);

            $result['publish'] = $session['publish'];
            $result['nbSequence'] = intval($session['nbLessons']);

            if ($session['nbLessons'] > 0)
            {
                foreach ($session['lessons'] as $id=>$sequence)
                {
                    $result[$id] = $sequence;
                }
            }

            echo json_encode($result);
        }
    }

    public function delete($id = null, $bool = null)
    {
        if ($this->verifConnexion())
        {
            if ($bool != 'yes' && $id != null)
            {
                    $_SESSION["idSession"] = $id;
                    $_SESSION["titleSession"] = $this->Session->ReadTitleSession(intval($id));
                    $this->view->render("sessions/delete");
            }
            elseif ($id != null)
            {
                    unset($_SESSION['idSession']);
                    unset($_SESSION['titleSession']);
                    unset($_SESSION['lessonsSession']);

                    $result = 0;
                    $title = "";

                    if ($id != null)
                    {
                            if ($id)
                            {
                                    $title = $this->Session->ReadTitleSession(intval($id));
                                    $result = $this->Session->DeleteSession(intval($id));
                            }
                            else
                                    $result = -2;
                    }
                    else
                            $result = -2;

                    if ($result >= 0)
                            $this->setFlash("Session &quot;".$title[0]["title"]."&quot; deleted", "success");
                    elseif ($result === -1)
                            $this->setFlash("This session doesn't exist", "danger");
                    elseif ($result === -2)
                            $this->setFlash("Internal error, please contact an administrator", "danger");

                    $this->view->redirect_to("session/edit");
            }
            else
                    $this->view->redirect_to("session/edit");
        }
    }

    public function create()
    {
        if ($this->verifConnexion())
        {
            $titleSession = $_POST['titleSession'];
            $tabSequence = explode(',', $_POST['sequenceToAdd']);
            $publish = $_POST['publish'];

            if ($titleSession != "")
            {
                    if ($tabSequence[0] != "")
                            $result = $this->Session->CreateSession($titleSession, $tabSequence, $publish);
                    else
                            $result = $this->Session->CreateSession($titleSession, null, $publish);
            }
            else
                    $result = "null";

            if ($result === 0)
            {
                    if (($id = $this->Session->FindIDSessionByTitle($titleSession)) > 0)
                    {
                            $session = $this->ReadSession($id);
                            $result = $id.",".$session["title"].",".$session["nbLessons"].",".$session["publish"];
                    }
                    else
                            $result = "null";
            }

            unset($_SESSION['idSession']);
            unset($_SESSION['titleSession']);
            unset($_SESSION['lessonsSession']);

            echo $result;
        }
    }

    public function update()
    {
        if ($this->verifConnexion())
        {
            $idSession = $_POST['idSession'];
            $titleSession = $_POST['titleSession'];
            $tabSequence = explode(',', $_POST['sequenceToAdd']);
            $publish = $_POST['publish'];

            for ($i = 0; $i < count($tabSequence); $i++)
                    $tabSequence[$i] = intval($tabSequence[$i]);

            if ($idSession != "" && $titleSession != "")
            {
                    if ($tabSequence[0] != "")
                            $result = $this->Session->UpdateSession($idSession, $titleSession, $tabSequence, $publish);
                    else
                            $result = $this->Session->UpdateSession($idSession, $titleSession, null, $publish);
            }
            else
                    $result = -3;

            if ($result === 0)
            {

                    if (($id = $this->Session->FindIDSessionByTitle($titleSession)) > 0)
                    {
                            $session = $this->ReadSession($id);
                            $result = $id.",".$session["title"].",".$session["nbLessons"].",".$session["publish"];
                    }
            }

            unset($_SESSION['idSession']);
            unset($_SESSION['titleSession']);
            unset($_SESSION['lessonsSession']);

            echo $result;
        }
    }

    private function defaultSessionInformation($methode = "", $log = "", $iID = null, $title = "", $lessonsSession = [])
    {
        if ($this->verifConnexion())
        {
            $_SESSION["methode"] = $methode;
            $_SESSION["allLessons"] = $this->Sequence->findAll();
            $_SESSION["log"] = $log;
            if ($iID != null)
            {
                    $session = $this->ReadSession($iID);

                    if (isset($session["title"]))
                            $_SESSION["titleSession"] = $session["title"];
                    else
                            unset ($_SESSION["titleSession"]);

                    $_SESSION["idSession"] = $iID;

                    if (isset($session["lessons"]))
                            $_SESSION["lessonsSession"] = $session["lessons"];
                    else
                            unset ($_SESSION["lessonsSession"]);
            }

            $_SESSION["nbSession"] = $this->Session->ReadNumberSessions();
            $this->view->msg = $this->ReadSession();
        }
    }

    private function readNumberBricksLesson($id)
    {
        if ($this->verifConnexion())
        {
            $result = $this->Lesson->ReadBricksLesson($id);
            return count($result);
        }
    }

    /* Prototype : ReadSession() */
    /* Description :  */
    /* Parameters : */
    /* Return : */
    public function ReadSession($id = null)
    {
        if ($this->verifConnexion())
        {
		$result = null;
		
		if ($id === null)
		{
			$nbSession = $this->Session->ReadNumberSessions();
			$tabTitleSession = $this->Session->ReadAllTitleSessions();
		
			for ($i = 0; $i < $nbSession; $i++)
			{
				$result[$tabTitleSession[$i]["id"]]["title"] = $tabTitleSession[$i]["title"];
				$tabLesson = $this->Session->ReadLessonsSession(intval($tabTitleSession[$i]["id"]));
				
				if (count($tabLesson) > 0)
				{
					foreach($tabLesson as $index=>$value)
					{
						$result[$tabTitleSession[$i]["id"]]["lessons"][$value] = $this->Sequence->findById($value)[0];
					}
				}
				
				$result[$tabTitleSession[$i]["id"]]["nbLessons"] = $this->Session->ReadNumberLessonsSession($tabTitleSession[$i]["id"]);
			}
		}
		else
		{
			$nbSession = $this->Session->ReadNumberSessions();
			$titleSession = $this->Session->ReadTitleSession($id);
		
			$result["title"] = $titleSession;
			$tabLesson = $this->Session->ReadLessonsSession($id);
			
			if (count($tabLesson) > 0)
			{
				$result["nbLessons"] = $this->Session->ReadNumberLessonsSession($id);
				
				foreach($tabLesson as $index=>$value)
				{
					$result["lessons"][$index] = $this->Sequence->findById($value)[0];
					$result["lessons"][$index]["nbBrick"] = $this->Sequence->countBricks($value);
				}
			}
			else
				$result["nbLessons"] = 0;
			
			if ($this->Session->ReadPublishSession($id))
				$result["publish"] = true;
			else
				$result["publish"] = false;
		}
		
		return $result;
        }
    }
}
