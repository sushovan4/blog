<?php session_start(); /* Starts the session */
if(!isset($_SESSION['Username'])){
header("location:login.php");
exit;
}
?>
 
<!DOCTYPE HTML>
<html  xml:lang="en" >
  
  <head>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Modern+Antiqua" />
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Modern Antiqua' type='text/css' />
    
    
    <!--   <\!-- Latest compiled and minified CSS -\-> -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <!--   <\!-- jQuery library -\-> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--   <\!-- Latest compiled JavaScript -\-> -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
    
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="style_new.css" /> -->
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap-social.css" />
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
   
  </head>
  
  <body>
   <audio id="audio" autoplay preload="auto" tabindex="0" controls="" type="audio/mpeg">
        <source type="audio/mp3" src="Audio/1.mp3">
        Sorry, your browser does not support HTML5 audio.
    </audio>

<script>
 	 var audio;
	var playlist;
var tracks;
var current;

init();
function init(){
    current = 1;
    audio = document.getElementById("audio");
    playlist = $('#playlist');
    tracks = playlist.find('li a');
    len = tracks.length - 1;
    audio.volume = .10;
    playlist.find('a').click(function(e){
        e.preventDefault();
        link = $(this);
        current = link.parent().index();
        run(link, audio);
    });
    audio.addEventListener('ended',function(e){
        current++;
        runNext(audio,current);
    });
}
function runNext(player, current){
  player.src = "Audio/" + current + ".mp3";
        
        audio.load();
        audio.play();
}
</script>
    

    <button type="button" class="btn btn-success" onclick="startChat( )"
	      style="position:fixed;
		     top: 0;
		     right: 0;">Start</button>
 <a href="private.php"><button type="button" class="btn btn-danger" onclick="startChat( )"
	      style="position:fixed;
		     top: 0;
		     left: 0;">End</button></a>

     <textArea id ="text" type="text" name="myText" onkeypress=" return sendDoc(event)"
	      rows="2"  cols="40" style="position:fixed;
			       bottom: 0;
			       right: 0;"></textArea> 
    
    <div id="chat" class="text-center">
      
    	<div id="messageArea" class="text-left"></div>
     </div>
      
 
    <ul id="playlist" style="visibility:hidden;">
        <li class="active"><a href="dauns.math.tulane.edu/~smajhi/public_html/Audio/1.mp3"></a></li>
        <li class="active"><a href="dauns.math.tulane.edu/~smajhi/public_html/Audio/2.mp3"></a></li>
        <li class="active"><a href="dauns.math.tulane.edu/~smajhi/public_html/Audio/3.mp3"></a></li>
        <li class="active"><a href="dauns.math.tulane.edu/~smajhi/public_html/Audio/4.mp3"></a></li>
        <li class="active"><a href="dauns.math.tulane.edu/~smajhi/public_html/Audio/5.mp3"></a></li>
        <li class="active"><a href="dauns.math.tulane.edu/~smajhi/public_html/Audio/6.mp3"></a></li>
        <li class="active"><a href="dauns.math.tulane.edu/~smajhi/public_html/Audio/7.mp3"></a></li>
    </ul>
    <script>
      function startChat( ){
      document.getElementById( "messageArea" ).innerHTML = "Chat started! Start typing..."; 
      var t = setInterval( loadDoc, 1000 );
      
      function loadDoc( ) {
      var xhttp;
      if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xhttp = new XMLHttpRequest();
      } else {
	// code for IE6, IE5
	xhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }

      xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      var message = this.responseText;
      if( message != ""){
     
      var div = document.createElement("P");
      div.style.border= "1px solid lightgreen";
      div.style.borderRadius= "10px";
      div.style.padding= "15px";
      div.style.paddingTop= "5px";
      div.style.paddingBottom= "2px";
      div.style.margin= "3px";
      div.style.position= "relative";
      div.style.color = "blue";
      div.style.maxWidth = "60%";
     
      div.innerHTML = message;
      document.getElementById( "messageArea" ).appendChild(div);
      
      $('#messageArea,html').scrollTop($('#messageArea,html')[0].scrollHeight);}
      }
      };
      
      xhttp.open("GET", "messageFetcherNita.php", true);
      xhttp.send();
      }
      
      function endChat( ){
      clearInterval(t);
      }
      
      }
      
      
      function sendDoc( e ){
      if( e.keyCode == 13 ){
      var message = document.getElementById( "text" ).value;
      if( message != ""){
      var xhttp = new XMLHttpRequest( );
      xhttp.onreadystatechange = function ( ) {     
      };
      d = new Date( );
      time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
      xhttp.open("GET","messageAppenderSush.php?q=" + "Sush: " + message + "<br>" + time + "<br>", true);
      xhttp.send();
      }
      
      document.getElementById( "text" ).value = "";
      d = new Date( );
      time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

       var div = document.createElement("div");
      div.style.border= "1px solid pink";
      div.style.borderRadius= "10px";
      div.style.padding= "15px";
      div.style.paddingBottom= "2px";
      div.style.margin= "3px";
      div.style.color = "magenta";
      div.style.paddingTop= "5px";
      div.style.marginLeft= "40%";
      div.style.maxWidth = "60%";
      
      div.innerHTML = "Sush: " + message + "<br>" + time;
      document.getElementById( "messageArea" ).appendChild(div);
      
      $('#messageArea').scrollTop($('#messageArea')[0].scrollHeight);
      
      return false;
      }
      }
      
      
    </script>
    
    
  </body>
</html>
