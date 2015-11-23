$// todo: this demo need to be updated for Firefox.
// it currently focuses only chrome.

function PostBlob(audioBlob, fileName) {
     var formData = new FormData();
     formData.append('filename',  fileName);
     formData.append('audio-blob', audioBlob);
     //formData.append('video-blob', videoBlob);
     xhr('player/save', formData, function(ffmpeg_output) {
          document.querySelector('h1').innerHTML = ffmpeg_output.replace(/\\n/g, '<br />');
          preview.src = 'http://localhost/public/uploads/' + fileName + '-merged.wav';
          preview.play();
          preview.muted = false;
          console.log(ffmpeg_output.replace(/\\n/g, '<br />'));
     });
}

var record = document.getElementById('record');
var stop = document.getElementById('stop');

var audio = document.querySelector('audio');

var recordVideo = document.getElementById('record-video');
var preview = document.getElementById('preview');

var container = document.getElementById('container');

var isFirefox = !!navigator.mozGetUserMedia;

var recordAudio;
record.onclick = function() {
     record.disabled = true;
     !window.stream && navigator.getUserMedia({
          audio: true
          // video: true
     }, function(stream) {
          window.stream = stream;
          onstream();
     }, function(error) {
          alert(JSON.stringify(error, null, '\t'));
     });

     window.stream && onstream();

     function onstream() {
          preview.src = window.URL.createObjectURL(stream);
          preview.play();
          preview.muted = true;

          recordAudio = RecordRTC(stream, {
               bufferSize: 16384,
               onAudioProcessStarted: function() {
                    if (!isFirefox) {
                         // recordVideo.startRecording();

                    }
               }
          });
          /*ecordVideo = RecordRTC(stream, {
           // type: 'video'
           });*/

          recordAudio.startRecording();

          stop.disabled = false;
     }
};

var fileName;
stop.onclick = function() {
     document.querySelector('h1').innerHTML = 'Getting Blobs...';

     record.disabled = false;
     stop.disabled = true;

     preview.src = '';
     preview.poster = 'ajax-loader.gif';

     fileName = Math.round(Math.random() * 99999999) + 99999999;

     if (!isFirefox) {
          recordAudio.stopRecording(function() {
               document.querySelector('h1').innerHTML = 'Got audio-blob. Getting video-blob...';

               document.querySelector('h1').innerHTML = 'Uploading to server...';
               PostBlob(recordAudio.getBlob(), fileName);

          });
     }
};

function xhr(url, data, callback) {
     var request = new XMLHttpRequest();
     request.onreadystatechange = function() {
          if (request.readyState == 4 && request.status == 200) {
               callback(request.responseText);
          }
     };
     request.open('POST', url);
     request.send(data);
}