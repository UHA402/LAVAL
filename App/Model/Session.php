<?php
use App\Core\Model\Model;

/* Generated from GenMyModel */

class Session extends Model {

	public function __construct()
	{
		parent::__construct();
	}

	/* Prototype : CreateSession($strTitle) */
	/* Description :  */
	/* Parameters : */
	/*   - strTitle :  */
	/* Return : */
    public function CreateSession($strTitle, $tabLessons)
    {
		$strNameColumn = "nbTitle";
        $result = $this->db->query("SELECT COUNT(title) as ".$strNameColumn." FROM tsessions WHERE title = '".$strTitle."'")[0][$strNameColumn];

		if (is_numeric($result))
		{
			$result = intval($result);

			if ($result === 0)
			{
				$this->db->query("INSERT INTO laval.tsessions (id, title, date) VALUES (NULL, '".$strTitle."', CURRENT_DATE());");
				$id = $this->db->query("SELECT id FROM tsessions WHERE title = '".$strTitle."'")[0]["id"];

				if (is_array($tabLessons))
				{
					foreach ($tabLessons as $index=>$value)
						$this->db->query("INSERT INTO laval.tsessions_tlessons (id, id_Sessions, id_Lessons) VALUES (NULL, ".$id.", '".$index."');");
				}
			}
			else
				$result = -2;
		}
		else
			$result = -1;

        return $result;
    }

	/* Prototype : UpdateSession($iID, $strTitle) */
	/* Description :  */
	/* Parameters : */
	/*   - iID :  */
	/*   - strTitle :  */
	/* Return : */
    public function UpdateSession($iID, $strTitle)
    {
		$result = $this->db->query("SELECT COUNT(*) as nbSession FROM laval.tsessions WHERE tsessions.id=".$iID.";")[0]["nbSession"];

		if (is_numeric($result) && (intval($result)) > 0)
		{
			$result = $this->db->query("SELECT COUNT(title) as nbTitleSession FROM laval.tsessions WHERE tsessions.title='".$strTitle."';")[0]["nbTitleSession"];
			if (is_numeric($result) && (intval($result)) === 0)
				$this->db->query("UPDATE laval.tsessions SET title = '".$strTitle."', date = CURRENT_DATE() WHERE tsessions.id = ".$iID.";");
			else
				$result = -2;
		}
		else
			$result = -1;

        return $result;
    }

	/* Prototype : DeleteSession($iID) */
	/* Description :  */
	/* Parameters : */
	/*   - iID :  */
	/* Return : */
    public function DeleteSession($iID)
    {
		$result = $this->db->query("SELECT COUNT(*) as nbSession FROM laval.tsessions WHERE tsessions.id=".$iID.";")[0]["nbSession"];

		if ($result > 0)
		{
			$liaison = $this->db->query("SELECT COUNT(*) as nbLiaison FROM laval.tsessions_tlessons WHERE id_Sessions = ".$iID.";")[0]["nbLiaison"];

			if ($liaison > 0)
				$this->DeleteLessonSession($iID);

			$this->db->query("DELETE FROM laval.tsessions WHERE tsessions.id=".$iID.";");
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
        $tab = $this->db->query("SELECT id_Sessions, id_Lessons FROM tsessions_tlessons WHERE id_Sessions = ".$iID.";");
		$result = null;

		for ($i = 0; $i < count($tab); $i++)
			$result[$i] = $tab[$i]["id_Lessons"];

        return $result;
    }

	public function DeleteLessonSession($iIDSession, $iIDLesson = null)
	{
		$result = $this->db->query("DELETE FROM laval.tsessions_tlessons WHERE tsessions_tlessons.id_Sessions = ".$iIDSession.";");

		return $result;
	}

	/* Prototype : ReadTitleSession($iID) */
	/* Description :  */
	/* Parameters : */
	/*   - iID :  */
	/* Return : */
    public function ReadTitleSession($iID)
    {
		$result = $this->db->query("SELECT COUNT(*) as nbSession FROM laval.tsessions WHERE tsessions.id=".$iID.";")[0]["nbSession"];

		if ($result > 0)
			$result = $this->db->query("SELECT title FROM tsessions WHERE tsessions.id=".$iID.";");
		else
			$result = -1;

        return $result;
    }
}
