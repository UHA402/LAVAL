<?php 

use App\Core\Session;
use App\Core\Model\Model;
class Media extends Model {
	private $id;
	private $title;
	private $url;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getTitle(){
		 return $this->title;
    } 
	public function getUrl(){
		 return $this->url;
    } 
	
	public function setTitle($tilte){
		 $this->title = $title;
    } 
	
	public function setUrl($ulr){
		 $this->url = $url;
    } 
	public function getId(){
		 return $this->id;
    } 
	
	public function setId($id){
		 $this->id = $id;
    } 
	
	
	/*public function create($media, $idBrick){
		$this->db->query("INSERT INTO MEDIA (title, url) VALUES ($media->getTitle(), $media->getUrl())");	
		$this->db->query("INSERT INTO tbricks_media (id_Bricks, id_Medias) VALUES ($idBrick, $media->getiD())");
	}
	
	public function update($media){
		//$data = $this->db->query("UPDATE `tbricks` SET title='".$strTitle."',type ='".$strType."',data='".$strData."' WHERE id= '".$iID."'");
		$this->db->query("UPDATE  MEDIA  SET title= $media->getTitle(), url=$media->getUrl())");
	}
	
	public function upload(){
		$target_path = 'public/medias/';
		$uploadOk = 1 ;
		$name = $_FILES['inputFile']['name'];
		$temp_name = $_FILES['inputFile']['temp_name'];
	    $target_path = $target_path.basename($name);
		if(files_exist($target_path)){	
			$uploadOk = 0;
		}
		
		if($uploadOk == 0){
			Session::setFlash('File already exist', 'warning');
		}else{
			
			if(move_uploaded_file($tmp_name, $target_path)){
				 Session::setFlash("The file ". basename($name). " has been uploaded.", 'warning');
			}else{
				Session::setFlash("Sorry, there was an error uploading your file", 'warning');
			}
			
		}
		
	}*/
}
	
	
	

