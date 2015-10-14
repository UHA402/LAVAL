var sequenceId = 1; //Fonction qui recup l'id de la sequence lancé
var nbBricks = 10; //"<?php echo GetNbBricks(sequenceId) ?>"; //Fonction PHP qui recup le nbr de briques total d'une leçon.
var positionSequence = 0; //Position dans la sequence
var listOfBrique = []; //List des objets brique

$(document).ready( function() {	
	
	//Chargement des briques
	LoadBrique();
	
	//Charge la premiere brique de la séquence
	if (listOfBrique.lenght > 0) {
		LoadTemplate(listOfBrique[0]);
		RefreshStatus();
	}
	
	//Event click sur "Suivant"
	$('#next-brique').click(function() {
		NextBrique();
	});
});

//Création d'un objet brique
function Brique(id, type, name, data) {
	this.id = id;
	this.type = type;
	this.name = name;
	this.data = data;
}

//Charge toutes les briques dans l'objet brique
function LoadBrique() {
	//fonction php qui recup la liste des id brique que contient la sequence
	var listBricks = "<?php echo GetTabBricks(sequenceId) ?>";
	
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
	case "MIDI":
		//chargement du model MIDI
		LoadModelSound(brique.data);
		break;
	case "WAVE":
		//chargement du model WAVE
		LoadModelTTS(brique.data);
		break;
	case "RESP":
		//chargement du model TTS
		LoadModelSound(brique.data);
		break;
	case "TEXT":
		//chargement du model Stimuli textuel
		LoadModelStimuliText(brique.data);
		break;
	case "IMG":
		//chargement du model Stimuli IMAGE
		LoadModelStimuliImg(brique.data);
		break;
	case 6:
		//chargement du model LOGATOMES
		break;
	default:
		//chargement du model ERREUR
	}
}

//Change la source du player audio
function LoadModelSound(url) {
	$("#briqueContent").load("http://192.168.33.10/LAVAL/App/View/lessons/sound.php", function() {
		$("#audio").attr("src",url).trigger("play");
	});	
}

//Change les stimuli textuel
function LoadModelStimuliText(stimuli) {
	//split la chaine de caractere
	var stimu = stimuli.split(",");
	
	//insert les stimuli dans le model
	$("#briqueContent").load("http://192.168.33.10/LAVAL/App/View/lessons/stimuli.php", function() {
		$("#stimu1").append('<a id="repStimu1" href="#"><h1>' + stimu[0] + '</h1></a>')
		$("#stimu2").append('<a id="repStimu2" href="#"><h1>' + stimu[1] + '</h1></a>')
		$("#stimu3").append('<a id="repStimu3" href="#"><h1>' + stimu[2] + '</h1></a>')
		$("#stimu4").append('<a id="repStimu4" href="#"><h1>' + stimu[3] + '</h1></a>')
		
		//lance un event au click
		$("#repStimu1").click(function () {
			SaveStimuli(1);
			NextBrique();
		});
		$("#repStimu2").click(function () {
			SaveStimuli(2);
			NextBrique();
		});
		$("#repStimu3").click(function () {
			SaveStimuli(3);
			NextBrique();
		});
		$("#repStimu4").click(function () {
			SaveStimuli(4);
			NextBrique();
		});
	});
}

//charge les stimuli img
function LoadModelStimuliImg(stimuli) {
	//split la chaine de caractere
	var stimu = stimuli.split(",");
	
	//insert les stimuli dans le model
	$("#briqueContent").load("http://192.168.33.10/LAVAL/App/View/lessons/stimuli.php", function() {
		$("#stimu1").append('<a id="repStimu1" href="#"><img src="' + stimu[0] + '" class="img-responsive" alt="Stimuli 1"></a>');
		$("#stimu2").append('<a id="repStimu1" href="#"><img src="' + stimu[1] + '" class="img-responsive" alt="Stimuli 2"></a>');
		$("#stimu3").append('<a id="repStimu1" href="#"><img src="' + stimu[2] + '" class="img-responsive" alt="Stimuli 3"></a>');
		$("#stimu4").append('<a id="repStimu1" href="#"><img src="' + stimu[3] + '" class="img-responsive" alt="Stimuli 4"></a>');
		
		$("#repStimu1").click(function () {
			SaveStimuli(1);
			NextBrique();
		});
		$("#repStimu2").click(function () {
			SaveStimuli(2);
			NextBrique();
		});
		$("#repStimu3").click(function () {
			SaveStimuli(3);
			NextBrique();
		});
		$("#repStimu4").click(function () {
			SaveStimuli(4);
			NextBrique();
		});
	}); 
}

//charge le TTS
function LoadModelTTS(msg) {
	$("#briqueContent").load("http://192.168.33.10/LAVAL/App/View/lessons/tts.php", function() {
		$("h1").append(msg)
		
		$("#playTTS").click(function() {
			var u = new SpeechSynthesisUtterance(msg);
		    speechSynthesis.speak(u);
		});
	});
}

//Met à jour la status bar
function RefreshStatus() {
	//incremente la position
	positionSequence++;
	
	//Maj de la progress bar
	ProgressBar();
	
	//verif si la sequence est fini
	VerifDone();
	
}

//Maj de la bar de progression
function ProgressBar() {
	var prog = ((positionSequence + 1)) * nbBricks;
	
	$(".progress-bar").attr("style", "width: " + prog + "%");
	$(".progress-bar").text((positionSequence + 1) + " / " + nbBricks + " briques")
}

//Verifie si la sequence est fini
function VerifDone() {
	
	//Verifi si la sequence est fini
	if(positionSequence + 1 === nbBricks) {
		$('#next-brique').removeClass("btn-success");
		$('#next-brique').addClass("btn-primary");
		$('#next-brique').text("Terminé");
		$("#next-brique").off("click");
		$("#next-brique").click(function () {
			alert("FINI !");
		});
	}
	//si la sequence n'est pas fini et que le type brique est 4 ou 5 (stimuli)
	else if(listOfBrique[positionSequence].type === "TEXT" || listOfBrique[positionSequence].type === "IMG") {
		console.log(listOfBrique[positionSequence].type);
		$("#next-brique").hide();
	}
	//si c'est une brique normal
	else {
		$("#next-brique").show();
	}
}

//Passe à la brique suivante
function NextBrique() {
	LoadTemplate(listOfBrique[positionSequence]);
	RefreshStatus();
}

//Sauvegarde le choix utilisateur
function SaveStimuli(numStimu) {
	
}