var sequenceId = 1; //Fonction qui recup l'id de la sequence lancé
var nbBricks = "<?php GetNbBricks(sequenceId) ?>"; //Fonction PHP qui recup le nbr de briques total d'une leçon.
var positionSequence = 0; //Position dans la sequence
var listOfBrique = []; //List des objets brique

$(document).ready( function() {
	//Chargement des briques
	LoadBrique();
	
	//Charge la premiere brique de la séquence
	LoadTemplate(listOfBrique[0]);
	
	//Event click sur "Suivant"
	$('next-brique').click(LoadTemplate(listOfBrique[positionSequence]));
});

//Création d'un objet brique
function Brique(id, type, name, data) {
	this.id = id;
	this.type = type;
	this.name = name;
	this.data = data;
}

//Charge toute les briques dans l'objet brique
function LoadBrique() {
	
	//fonction php qui recup la list des id brique que contient la sequence
	var listBricks = "<?php GetTabBricks(sequenceId) ?>";
	
	for (var clef in listBricks) {
		var id = listBricks[clef];
		var type = GetTypeBrick(id);
		var name = GetNameBrick(id);
		var data = GetDataBrick(id);
		var nvlBrique = new Brique(id, type, name, data);
		listOfBrique.push(nvlBrique);
	}
}

//Retourne le type de la brique
function GetTypeBrick(id) {
	return "<?php echo GetTypeBrick(id) ?>";
}

//Retourne le nom de la brique
function GetNameBrick(id) {
	return "<?php echo GetNameBrick(id) ?>";
}

//Retourne le contenu de la brique
function GetDataBrick(id) {
	return "<?php echo GetDataBrick(id) ?>";
}

//Charge le model suivant le type de brique
function LoadTemplate(brique) {
	
	switch(brique.type) {
	case 1:
		//chargement du model MIDI
		$("#briqueContent").load("http://192.168.33.10/LAVAL/App/View/lessons/sound.php");
		//modif de la src audio avec la donnée de la DB
		ChangeAudioSrc(brique.data);
		positionBrique++; //incrémente la position 
		break;
	case 2:
		//chargement du model WAVE
		$("#briqueContent").load("http://192.168.33.10/LAVAL/App/View/lessons/sound.php");
		//modif de la src audio avec la donnée de la DB
		ChangeAudioSrc(brique.data);
		positionBrique++; //incrémente la position 
		break;
	case 3:
		//chargement du model TTS
		positionBrique++; //incrémente la position 
		break;
	case 4:
		//chargement du model NON-MOT
		positionBrique++; //incrémente la position 
		break;
	case 5:
		//chargement du model IMAGE
		positionBrique++; //incrémente la position 
		break;
	case 6:
		//chargement du model LOGATOMES
		positionBrique++; //incrémente la position 
		break;
	default:
		//chargement du model ERREUR
	}
}

//Change la source du player audio
function ChangeAudioSrc(url) {
	$("#audio").attr("src",url).trigger("play");
}


function ProgressBar() {
	
}