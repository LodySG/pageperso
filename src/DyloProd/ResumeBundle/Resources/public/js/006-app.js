$(document).ready(function() {

   createjs.Sound.registerSound("/jb.mp3", "jb");
   var song = null; 
    $( ".draggable" ).draggable();
    
    $("#typed").typed({
            stringsElement: $("#typed-strings"),
            typeSpeed: 100,
        });

   // $.fn.snow();

   $(".draggable").on("click",function() { 
	if(song == null)
		song = createjs.Sound.play("jb");
	else{
		if(song.paused == false)
                	song.paused = true;
        	else
                	song.play();
	} 	
    });
 });
