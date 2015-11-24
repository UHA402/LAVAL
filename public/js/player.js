/* global brick, url, speechSynthesis, brickJson */

var currentSequence = 0;
var nbSequence = 0;
var tabBrick = new Array();

$(function () {

    //DEBUG
    /*var brick = {id: 1, name: "Record", type: "REC", data: "Text to record"};
    var brick1 = {id: 1, name: "Brick 1", type: "TTS", data: "text to speech"};
    var brick2 = {id: 2, name: "Brick 2", type: "TXT", data: "un,deux,trois,quatre"};
    var brick3 = {id: 3, name: "Brick 3", type: "IMG", data: "http://vignette2.wikia.nocookie.net/desencyclopedie/images/b/b3/Chat_cool.jpg/revision/latest?cb=20130412102158,http://vignette2.wikia.nocookie.net/desencyclopedie/images/b/b3/Chat_cool.jpg/revision/latest?cb=20130412102158,http://vignette2.wikia.nocookie.net/desencyclopedie/images/b/b3/Chat_cool.jpg/revision/latest?cb=20130412102158,http://vignette2.wikia.nocookie.net/desencyclopedie/images/b/b3/Chat_cool.jpg/revision/latest?cb=20130412102158" };
    var brick4 = {id: 4, name: "Brick 4", type: "WAVE", data: url+"public/media/test.wav"};*/
    var brickList = [];
    var mediaTemp = "";
    
    tabBrick = JSON.parse(brickJson);
    console.log(tabBrick);
    
    nbSequence = tabBrick.tabSequence.length;
    console.log(nbSequence);
    
    /*for (brick of tabBrick.tabSequence[currentSequence].tabBrick)
    {
        mediaTemp = "";
        var temp = "";
        
        if (brick.type === "IMG" || brick.type === "WAVE"){
            for (var i = 0; i < brick.medias.length - 1; i++){
                mediaTemp += brick.medias[i]["0"].url + ",";
            }
            mediaTemp += brick.medias[brick.medias.length - 1]["0"].url;
            temp = {id: parseInt(brick.bricks_id), name: brick.title, type: brick.type, data: mediaTemp};
        }else{
            temp = {id: parseInt(brick.bricks_id), name: brick.title, type: brick.type, data: brick.data};
        }
        brickList.push(temp);
    }
    console.log(brickList);
    
    

    //Initialisation du player
    var player = new Player(brickList);
    console.log('--- Player Initialisation ---');
    //Start Player
    console.log('Player Start...');
    player.start();*/
    
    nextSequence();

});

function nextSequence () {
    var brickList = [];
    
    for (brick of tabBrick.tabSequence[currentSequence].tabBrick)
    {
        mediaTemp = "";
        var temp = "";
        
        if (brick.type === "IMG" || brick.type === "WAVE"){
            for (var i = 0; i < brick.medias.length - 1; i++){
                mediaTemp += brick.medias[i]["0"].url + ",";
            }
            mediaTemp += brick.medias[brick.medias.length - 1]["0"].url;
            temp = {id: parseInt(brick.bricks_id), name: brick.title, type: brick.type, data: mediaTemp};
        }else{
            temp = {id: parseInt(brick.bricks_id), name: brick.title, type: brick.type, data: brick.data};
        }
        brickList.push(temp);
    }
    
    console.log(brickList);

    //Initialisation du player
    var player = new Player(brickList);
    console.log('--- Player Initialisation ---');
    //Start Player
    console.log('Player Start...');
    currentSequence++;
    player.start();
}

var Player = function (brickList) {

    // Charge les brick
    var brick = [];
    $.each(brickList, function (key, value) {
        brick.push(new Brick(value));
    });

    // Retourne le nbr de brick chargé
    function getNbrBrick() {
        return brick.length;
    }

    // Start le Player
    this.start = function () {
        //Charge l'event sur le bouton next
        $("#next-brique").off("click");
        $('#next-brique').click(function () {
            loadBrick();
        });
        //Charge la premiere brick
        loadBrick();
    };


    //position dans la list
    var posList = 0;

    function incPosList() {
        posList += 1;
        console.log('_Position inc : (' + posList + ')');
    }

    // Refresh le status du player
    function refreshStatus() {
        console.log('Status refresh...');
        incPosList();
        majProgressBar();

        //fin de la sequence
        if (posList === getNbrBrick()) {
            $('#next-brique').removeClass("btn-success");
            $('#next-brique').addClass("btn-info");
            if (currentSequence < nbSequence) {
                $('#next-brique').text("Next Sequence");
            } else {
                $('#next-brique').text("Finish");
            }
            $("#next-brique").off("click");
            $("#next-brique").click(function () {
                sequenceDone();
                if (currentSequence < nbSequence) {
                    nextSequence();
                } else {
                    document.location.href= url + "user/index";
                }
            });
        }
    }

    //Charge une brick
    function loadBrick() {
        console.log('Load Brick ' + posList + '...');
        brick[posList].loadModel();
        refreshStatus();
    }

    //Met à jour la bar de progression
    function majProgressBar() {
        var prog = (posList / getNbrBrick()) * 100;
        $(".progress-bar").attr("style", "width: " + prog + "%");
    }

    //Fin de la séquence envoi des données au controller PHP
    function sequenceDone() {
        var methodcall = url + 'player/save/';
        var result = "session=" + tabBrick.session + "&sequence=" + currentSequence;
        var i = 0;
        
        for (i; i < brick.length; i++) {
            if (brick[i].result !== undefined) {
                result += "&" + brick[i].id + "=" + brick[i].result;
            }
        }
        console.log(result);
        
        $.ajax({
            type: 'POST',
            url: methodcall,
            data: result,
            success: function(msg) {
                console.log('save done');
                console.log(msg);
            }
        });
    }
};

var Brick = function (value) {
    this.id = value.id;
    this.type = value.type;
    this.name = value.name;
    this.data = value.data;
    this.result;

    this.loadModel = function () {
        var model = new Model(this);
        console.log('Load Model...');
        return model.load();
    };

    this.setResult = function (value) {
        this.result = value;
    };
};

var Model = function (brick) {
    var type = brick.type;
    var data = brick.data;
    this.load = function () {
        if (type === 'TTS') {
            console.log('Model TTS Loaded');
            $("#briqueContent").load(url + "player/ttsLayout/", function () {
                $("h1").append(data);
                $("#playTTS").click(function () {
                    var u = new SpeechSynthesisUtterance(data);
                    u.lang = 'en-US';
                    speechSynthesis.speak(u);
                });
            });

        } else if (type === 'WAVE') {
            console.log('Model Wave Loaded');
            $("#briqueContent").load(url + "player/soundLayout/", function () {
                $("#audio").attr("src", data).trigger("play");
            });

        } else if (type === 'TXT') {
            console.log('Model TXT Loaded');
            //cache le bouton next;
            $("#next-brique").hide();
            //split la chaine de caractere
            var stimutxt = data.split(",");
            //insert les stimuli dans le model
            $("#briqueContent").load(url + "player/txtLayout/", function () {
                for (var i = 1; i < 5; i++) {
                    $("#stimu" + i).append('<a id="repStimu' + i + '" href="javascript:void(0)"><h1>' + stimutxt[i - 1] + '</h1></a>');
                }
                $("#repStimu1").click(function () {
                    brick.setResult(stimutxt[0]);
                    console.log('Result : ' + brick.result + ' saved');
                    $("#next-brique").show();
                });
                $("#repStimu2").click(function () {
                    brick.setResult(stimutxt[1]);
                    console.log('Result : ' + brick.result + ' saved');
                    $("#next-brique").show();
                });
                $("#repStimu3").click(function () {
                    brick.setResult(stimutxt[2]);
                    console.log('Result : ' + brick.result + ' saved');
                    $("#next-brique").show();
                });
                $("#repStimu4").click(function () {
                    brick.setResult(stimutxt[3]);
                    console.log('Result : ' + brick.result + ' saved');
                    $("#next-brique").show();
                });
            });
        } else if (type === 'RESP') {
            console.log('Model Record loaded');
            $("#briqueContent").load(url + "player/recordLayout/", function () {
                
            });
        } else if (type === 'IMG') {
            console.log('Model IMG Loaded');
            //cache le bouton next;
            $("#next-brique").hide();
            //split la chaine de caractere
            var stimuimg = data.split(",");
            //insert les stimuli dans le model
            $("#briqueContent").load(url + "player/imgLayout/", function () {
                for (var i = 1; i < 5; i++) {
                    $("#stimu" + i).find("img").attr("src", stimuimg[i - 1]);
                }
                $("#repStimu1").click(function () {
                    brick.setResult(stimuimg[0]);
                    console.log('Result : ' + brick.result + ' saved');
                    $("#next-brique").show();
                });
                $("#repStimu2").click(function () {
                    brick.setResult(stimuimg[1]);
                    console.log('Result : ' + brick.result + ' saved');
                    $("#next-brique").show();
                });
                $("#repStimu3").click(function () {
                    brick.setResult(stimuimg[2]);
                    console.log('Result : ' + brick.result + ' saved');
                    $("#next-brique").show();
                });
                $("#repStimu4").click(function () {
                    brick.setResult(stimuimg[3]);
                    console.log('Result : ' + brick.result + ' saved');
                    $("#next-brique").show();
                });
            });
        }
    };
};

