<?php 
use App\Core\Session;
use App\Core\Model\Model;

class Media extends Model {
    private $id;
    private $title;
    private $url;
    private $type;

    public function __construct(){
        parent::__construct('tmedias');
    }
	
    public function getTitle(){
        return $this->title;
    } 
    public function getUrl(){
        return $this->url;
    } 
	
    public function setTitle($title){
        $this->title = $title;
    } 
	
    public function setUrl($url){
        $this->url = $url;
    } 
    
    public function getId(){
        return $this->id;
    } 
	
    public function setId($id){
        $this->id = $id;
    } 
    
    /**
     * @return mixed
     */
    public function getType(){
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type){
	$this->type= $type;
    }

    public function setFields(){
        for ($i = 0; $i < count($this->url); $i++) {
            $this->setTabFields(['title'=>$this->title[$i],  'url'=>$this->url[$i], 'type'=>$this->type]);
        }
    }
    
    public function createMedia()
    {
        $i = 0;
        $verif = false;
        
        for ($i = 0; $i < count($this->url); $i++) {
            $tabId[$i] = intval($this->db->query("SELECT id FROM tmedias WHERE title LIKE '".$this->title[$i]."';")[0]['id']);
            
            if ($tabId[$i] === 0) {
                $this->db->query("INSERT INTO tmedias (title, url, type) VALUES ('".$this->title[$i]."','".$this->url[$i]."','".$this->type."');");
            } else {
                $verif = true;
            }
        }
        $tabId["verif"] = $verif;
        
        return $tabId;
    }
    
    public function upload($index, $destination, $maxSize = false, $extensions = false)
    {
        $file = $_FILES[$index];
        $tabFile = array();
        $tabFileName = array();
        
        if (is_array($file["name"])) {
            for ($i = 0; $i < count($file["name"]); $i++) {
                $tabFile[$i]["name"] = $file["name"][$i];
                $tabFile[$i]["type"] = $file["type"][$i];
                $tabFile[$i]["tmp_name"] = $file["tmp_name"][$i];
                $tabFile[$i]["error"] = $file["error"][$i];
                $tabFile[$i]["size"] = $file["size"][$i];
            }
        } else {
            $tabFile[0]["name"] = $file["name"];
            $tabFile[0]["type"] = $file["type"];
            $tabFile[0]["tmp_name"] = $file["tmp_name"];
            $tabFile[0]["error"] = $file["error"];
            $tabFile[0]["size"] = $file["size"];
        }
        
        foreach ($tabFile as $id=>$file) {
            //Test1: fichier correctement uploadé
            if (!isset($file) || $file['error'] > 0) {
                return -1;
            }

            //Test2: taille limite
            if ($maxSize && $file['size'] > $maxSize) {
                return -2;
            }

            //Test3: extension
            $ext = substr(strrchr($file['name'], '.'), 1);
            if ($extensions && ! in_array($ext, $extensions)) {
                return -3;
            }

            //Déplacement
            if (!file_exists($destination)) {
                mkdir($destination);
            }

            $path = $destination.'/'.$file['name'];
            $tabFileName[$id] = (move_uploaded_file($file['tmp_name'], $path) ? $path : -4);
        }
            
        return $tabFileName;
    }
}
	
	
	

