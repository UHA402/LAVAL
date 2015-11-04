$(function () {
    $('#record').click(function () {
        elt = $(this);

        Fr.voice.record(false, function () {
            elt.html('Stop Recording');
            elt.attr('disabled', true);
        });


    });

    $('#play').click(function () {
        var data = new FormData();
        Fr.voice.export(function(blob){
            var reader = new window.FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(event) {
                data.append('file', new Date().toISOString() + '.wav');
                data.append('data', event.target.result);
                console.log(data);
                $.ajax({
                    url: "http://local.dev/LAVAL/player/savesound",
                    type: 'POST',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function (datas) {
                        console.log(datas);
                    }
                });
            }


        }, "blob");
        /*Fr.voice.export(function (url) {
            $("#audio").attr('controls', false);
            $("#audio").attr('src', url);
            $("#audio")[0].play();
            $("#record").attr('disabled', false);
            $("#record").html('Start Recording');

            var data = new FormData();

            data.append('file', new Date().toISOString() + '.wav');
            data.append('data', base64data);

            $.ajax({
                url: "http://local.dev/LAVAL/player/savesound",
                type: 'POST',
                data: data,
                contentType: false,
                processData: false,
                success: function (datas) {
                    console.log(datas);
                }
            });

        }, "URL");*/
        end();
    });

    $('#reset').click(function () {

        end();
    });

    $('#save').click(function (e) {

        save()
        ;
    });
});

var end = function () {

    Fr.voice.stop();
}

function saves() {

}