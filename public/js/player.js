$(function () {

    //DEBUG
    var brick1 = {id: 1, name: "Brick 1", type: "TTS", data: "text to speech"};
    var brick2 = {id: 2, name: "Brick 2", type: "TXT", data: "un,deux,trois,quatre"};
    var brick3 = {id: 3, name: "Brick 3", type: "IMG", data: "http://img.fr"};
    var brick4 = {id: 4, name: "Brick 4", type: "Wave", data: "http://sound.fr"};
    var brickList = [brick1, brick2, brick3, brick4];

    //Initialisation du player
    var player = new Player(brickList);
    console.log('--- Player Initialisation ---');
    //Start Player
    console.log('Player Start...');
    player.start();

});

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
        $('#next-brique').click(function() {
            loadBrick();
        });
        //Charge la premiere brick
        loadBrick();
    }

    // Refresh le status du player
    function refreshStatus() {
        console.log('Status refresh...');
        //Verification de la fin de la liste
        if(posList < getNbrBrick())
        {
            incPosList();
            majProgressBar();
        }  else {
            $('#next-brique').removeClass("btn-success");
            $('#next-brique').addClass("btn-info");
            $('#next-brique').text("Finish");
            $("#next-brique").off("click");
            $("#next-brique").click(function () {
                alert("FINI !");
            });
        }
    }

    //position dans la list
    var posList = 0;
    function incPosList() {
        console.log('_Position inc');
        posList += 1;
    }

    //Charge une brick
    function loadBrick() {
        console.log('Load Brick...');
        $("#next-brique").show();
        brick[posList].loadModel();
        refreshStatus();
    }

    //Met à jour la bar de progression
    function majProgressBar() {
        if(posList === 0) {
            $(".progress-bar").attr("style", "width: 0%");
        } else {
            var prog = ((posList) * getNbrBrick());
            $(".progress-bar").attr("style", "width: " + prog + "%");
        }
    }
}

var Brick = function (value) {
    this.id = value.id;
    this.type = value.type;
    this.name = value.name;
    this.data = value.data;
    this.result;

    this.loadModel = function () {
        var model = new Model(this.type, this.data);
        console.log('Load Model...')
        return model.load();
    }
}

var Model = function (type, data) {

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
            //split la chaine de caractere
            var stimu = data.split(",");
            //insert les stimuli dans le model
            $("#briqueContent").load(url + "player/txtLayout/", function () {
                $("#stimu1").append('<a id="repStimu1" href="#"><h1>' + stimu[0] + '</h1></a>')
                $("#stimu2").append('<a id="repStimu2" href="#"><h1>' + stimu[1] + '</h1></a>')
                $("#stimu3").append('<a id="repStimu3" href="#"><h1>' + stimu[2] + '</h1></a>')
                $("#stimu4").append('<a id="repStimu4" href="#"><h1>' + stimu[3] + '</h1></a>')
            });

            $("#next-brique").hide();
        }
    }
}

