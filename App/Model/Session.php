<?php
use App\Core\Model\Model;

/* Generated from GenMyModel */

class Session extends Model {
	
	public function __construct()
	{
		parent::__construct("tsessions");
	}
	
	/* Prototype : CreateSession($strTitle) */
	/* Description :  */
	/* Parameters : */
	/*   - strTitle :  */
	/* Return : */
    public function CreateSession($strTitle, $tabLessons, $publish)
    {
		$strNameColumn = "nbTitle";
        $result = $this->db->query("SELECT COUNT(title) as ".$strNameColumn." FROM tsessions WHERE title = '".$strTitle."'")[0][$strNameColumn];
		
		if (is_numeric($result))
		{
			$result = intval($result);
			
			if ($result === 0)
			{
				$this->db->query("INSERT INTO tsessions (id, title, date, publish) VALUES (NULL, '".$strTitle."', CURRENT_DATE(), ".$publish.");");
				$id = $this->db->query("SELECT id FROM tsessions WHERE title = '".$strTitle."'")[0]["id"];
				
				if (is_array($tabLessons))
				{
					foreach ($tabLessons as $index=>$value)
						$this->db->query("INSERT INTO tsessions_sequences (id, id_Sessions, id_Sequences) VALUES (NULL, ".$id.", '".$value."');");
				}
			}
			else
				$result = -2;
		}
		else
			$result = -1;
        
        return $result;
    }
	
	public function FindIDSessionByTitle($strTitle)
	{
		$result = 0;
		$result = intval($this->db->query("SELECT id FROM tsessions WHERE title = '".$strTitle."'")[0]["id"]);
		
		return $result;
	}

	/* Prototype : UpdateSession($iID, $strTitle) */
	/* Description :  */
	/* Parameters : */
	/*   - iID :  */
	/*   - strTitle :  */
	/* Return : */
    public function UpdateSession($iID, $strTitle, $tabLessons, $publish)
    {
		$result = $this->db->query("SELECT COUNT(*) as nbSession FROM tsessions WHERE tsessions.id=".$iID.";")[0]["nbSession"];
		
		if (is_numeric($result) && (intval($result)) > 0)
		{
			$result = $this->db->query("SELECT title, id FROM tsessions WHERE tsessions.title='".$strTitle."';");

			if (count($result) === 0)
			{
				$this->db->query("UPDATE tsessions SET title = '".$strTitle."', date = CURRENT_DATE(), publish = ".$publish." WHERE tsessions.id = ".$iID.";");
				
				$result = 0;
			}
			else
			{
				$test = false;
				
				for ($i = 0; $i < count($result); $i++)
				{
					if ($result[$i]['id'] === $iID && $result[$i]['title'] === $strTitle)
						$test = true;
				}
				
				if ($test)
				{
					$this->db->query("UPDATE tsessions SET title = '".$strTitle."', date = CURRENT_DATE(), publish = ".$publish." WHERE tsessions.id = ".$iID.";");
					$result = 0;
				}
				else
					$result = -2;
			}
			
			if (is_array($tabLessons))
			{
				$liaison = $this->db->query("SELECT COUNT(*) as nbLiaison FROM tsessions_sequences WHERE id_Sessions = ".$iID.";")[0]["nbLiaison"];
                                
				if ($liaison > 0)
					$this->DeleteLessonSession($iID);
				
				foreach ($tabLessons as $index=>$value)
					$this->db->query("INSERT INTO tsessions_sequences (id, id_Sessions, id_Sequences) VALUES (NULL, ".$iID.", '".$value."');");
			}
		}
		else
			$result = -1;
        
        return intval($result);
    }

	/* Prototype : DeleteSession($iID) */
	/* Description :  */
	/* Parameters : */
	/*   - iID :  */
	/* Return : */
    public function DeleteSession($iID)
    {
		$result = $this->db->query("SELECT COUNT(*) as nbSession FROM tsessions WHERE tsessions.id=".$iID.";")[0]["nbSession"];
		
		if ($result > 0)
		{
			$liaison = $this->db->query("SELECT COUNT(*) as nbLiaison FROM tsessions_sequences WHERE id_Sessions = ".$iID.";")[0]["nbLiaison"];
			
			if ($liaison > 0)
				$this->DeleteLessonSession($iID);
			
			$this->db->query("DELETE FROM tsessions WHERE tsessions.id=".$iID.";");
		}
		else
			$result = -1;
        
        return $result;
    }

    /* Prototype : ReadNumberSessions() */
    /* Description :  */
    /* Parameters : */
    /* Return : */
    public function ReadNumberSessions()
    {
        $result = $this->db->query("SELECT COUNT(*) as nbSession FROM tsessions")[0]["nbSession"];
        
        return $result;
    }

    /* Prototype : ReadAllTitleSessions() */
    /* Description :  */
    /* Parameters : */
    /* Return : */
    public function ReadAllTitleSessions()
    {
        $result = $this->db->query("SELECT id, title FROM tsessions");
		
        return $result;
    }

    /* Prototype : ReadLessonsSession($iID) */
    /* Description :  */
    /* Parameters : */
    /*   - iID :  */
    /* Return : */
    public function ReadLessonsSession($iID)
    {
        $tab = $this->db->query("SELECT * FROM tsessions_sequences WHERE id_Sessions = ".$iID." ORDER BY id;");
		$result = null;
		
		for ($i = 0; $i < count($tab); $i++)
			$result[$i] = $tab[$i]["id_Sequences"];
        
        return $result;
    }
	
    /* Prototype : ReadNumberLessonsSession($iID) */
    /* Description :  */
    /* Parameters : */
    /*   - iID :  */
    /* Return : */
    public function ReadNumberLessonsSession($iID)
    {
        $result = intval($this->db->query("SELECT COUNT(*) as nbSequences FROM tsessions_sequences WHERE id_Sessions = ".$iID.";")[0]["nbSequences"]);
        
        return $result;
    }
	
    public function DeleteLessonSession($iIDSession, $iIDLesson = null)
    {
            $result = $this->db->query("DELETE FROM tsessions_sequences WHERE tsessions_sequences.id_Sessions = ".$iIDSession.";");

            return $result;
    }

    /* Prototype : ReadTitleSession($iID) */
    /* Description :  */
    /* Parameters : */
    /*   - iID :  */
    /* Return : */
    public function ReadTitleSession($iID)
    {
		$result = $this->db->query("SELECT COUNT(*) as nbSession FROM tsessions WHERE tsessions.id=".$iID.";")[0]["nbSession"];
		
		if ($result > 0)
			$result = $this->db->query("SELECT title FROM tsessions WHERE tsessions.id=".$iID.";")[0]["title"];
		else
			$result = -1;
        
        return $result;
    }
	
	public function ReadPublishSession($iID)
    {
		$result = $this->db->query("SELECT COUNT(*) as nbSession FROM tsessions WHERE tsessions.id=".$iID.";")[0]["nbSession"];
		
		if ($result > 0)
			$result = intval($this->db->query("SELECT publish FROM tsessions WHERE tsessions.id=".$iID.";")[0]["publish"]);
		else
			$result = -1;
        
        return $result;
    }
}
