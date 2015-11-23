$(function(){
    $('#record').click(function(){
        elt=$(this);
        
            Fr.voice.record(false, function(){
                elt.html('Stop Recording');
                elt.attr('disabled', true);
            });
          
      
      
 });       
    
    $('#play').click(function(){
        Fr.voice.export(function(url){
            $("#audio").attr('controls', false);
            $("#audio").attr('src', url);
            $("#audio")[0].play();
            $("#record").attr('disabled', false);
            $("#record").html('Start Recording');
           
             
        }, "URL");
       end();
    });
    
    $('#reset').click(function(){
        
        end();
    });
    
     $('#save').click(function(e){
        
         save();
  });
});

var end = function(){
   
    Fr.voice.stop();
}

var saves = function(){
    this.recorder && this.recorder.exportWAV(function(blob){
        var url = URL.createObjectURL(blob);
    var data = new FormData();
    data.append('file', url);
    
    $.ajax({
      url: "http://localhost/player/save",
      type: 'GET',
      data: data,
      contentType: false,
      processData: false,
      success: function(datas) {
        console.log(datas);
      }
    });
  });
}