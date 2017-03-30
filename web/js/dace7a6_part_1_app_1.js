$(function() {
    $( ".draggable" ).draggable();
    
    $("#typed").typed({
            stringsElement: $("#typed-strings"),
            typeSpeed: 100,
        });
    
    $.fn.snow();
  
 })