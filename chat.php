<?php
   session_start(); /* Starts the session */
   if(!isset($_SESSION['who'])){
   header("location:chat_login.php");
   exit;
   }
   $who = $_SESSION['who'];
   $whom = $_SESSION['whom'];
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
    <script src="chat.js"></script>
    
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="style_new.css" /> -->
    <link rel="stylesheet" type="text/css" media="screen" href="style_chat.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap-social.css" />
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
   
  </head>
  
  <body>    
    <nav class="navbar navbar-bar navbar-fixed-top">
      <div class="container-fluid">
	<div class="navbar-header">
	  	  
	  <div class="btn-group text-center" style="margin-left: 15px;">
            <button id="save" type="button" class="btn btn-primary btn-sm">Contacts</button>	  
	    <button id="end" type="button" class="btn btn-secondary btn-sm" onclick="endChat( )">Messages</button>
	    <button id="sendPic" type="button" class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#uploadForm">Chat</button>
	  </div>
	  
	</div>
	
      </div> 
    </nav>
    
   
    
    
    <div  style="position: absolute; width: 100%; height: 100%;">
      <div id="contacts" style="position:absolute; top:50%;">Your friends
      </div>
      

 
      <div id="chat" class="text-center">
    	<div id="messageArea" class="text-left"></div>
      </div>
      
      <textArea style="position: absolute; bottom: 0%; width: 80%; height: 10%; border: none; border-radius: 15px; margin: 5px;"
	  	id ="text" type="text" name="myText" onkeypress=" return sendDoc(event)"></textArea>
      <div class="btn-group-vertical" style="position: absolute; bottom: 0; right: 0; margin: 2px;">
	<button type="button" class="btn btn-info btn-sm" onclick="sendDoc('send')">Send</button>
      </div>
      
      <form action="uploadHandler.php" class="uploadForm collapse" id="uploadForm" method="POST" enctype="multipart/form-data">
	<input type="file" name="fileToUpload"/>
	<button id="upload" class="btn btn-danger btn-sm" name="submit" type="submit">Submit</button>
      </form>
     </div>	  
     
     <script>
       getContacts( );

function startChat( ){
     // <!-- set the timer -->
      t0 = new Date();
       // <!-- retreive old chat -->
       var xhttpInit;
       if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
	xhttpInit = new XMLHttpRequest();
    } else {
	// code for IE6, IE5
	xhttpInit = new ActiveXObject("Microsoft.XMLHTTP");
    }
   
    xhttpInit.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	  document.getElementById( "messageArea" ).innerHTML = this.responseText;
		
	  var sHeight = document.getElementById("messageArea").scrollHeight;
          $('#messageArea,html').scrollTop( sHeight );
	  
    }
    }
   
    xhttpInit.open("GET", "chatHistoryFetcher.php?who=<?php echo $who;?>&whom=<?php echo $whom;?>", true);
    xhttpInit.send();

        lastUploadedPhoto = "<?php echo $_SESSION['lastUpload']; ?>";
        setTimeout( uploadedPhotoShow, 1000 );

	function uploadedPhotoShow( ) {
           if( lastUploadedPhoto != "" )
	   {
                  
		    var divP = document.createElement("IMG");
 		    divP.setAttribute("src", "ChatData/" + lastUploadedPhoto );
 		    divP.setAttribute("height", "80%" );
 		    divP.setAttribute("width", "60%" );
 		    divP.setAttribute("class", "uploadedPhoto img-responsive" );
 		    divP.style.padding = "1px";
		    
                    document.getElementById( "messageArea" ).appendChild(divP);
		   

		    var sHeight = document.getElementById("messageArea").scrollHeight + 1000;
                     $('#messageArea,html').scrollTop( sHeight );

          }   
  	  
       }
      <?php unset( $_SESSION['lastUpload'] ); ?>

     t = setInterval( loadDoc, 1000 );
     t_img = setInterval( loadImg, 5000 );

     function loadImg( ) {
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
 		var imgName = this.responseText;
 		if( imgName != ""){

		    var div = document.createElement("A");
 		    div.setAttribute("href", "ChatData/" + imgName );
 		    
		    var divChild = document.createElement("IMG");
 		    divChild.setAttribute("src", "ChatData/" + imgName );
 		    divChild.setAttribute("height", "80%" );
 		    divChild.setAttribute("width", "60%" );
 		    divChild.setAttribute("class", "img-responsive" );
 		    divChild.style.padding = "1px";
                    div.appendChild(divChild);
		    
                    document.getElementById( "messageArea" ).appendChild(div);
		   

		    var sHeight = document.getElementById("messageArea").scrollHeight + 1000;
                     $('#messageArea,html').scrollTop( sHeight );
	  
		     
 	    }
	    }
 	};
	
 	xhttp.open("GET", "imgFetcher.php?who=<?php echo $who;?>&whom=<?php echo $whom;?>", true);
 	xhttp.send();
     }
    
    
    
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
		    
		    var div = document.createElement("div");
		    div.className = "commingMessages";
		    div.innerHTML = message;
		    document.getElementById( "messageArea" ).appendChild(div);
		    var sHeight = document.getElementById("messageArea").scrollHeight;
                     $('#messageArea,html').scrollTop( sHeight );
	  
		     
		    }
	    }
	};
	
	xhttp.open("GET", "messageFetcher.php?who=<?php echo $who;?>&whom=<?php echo $whom;?>", true);
	xhttp.send();
       }
}


function endChat( ){
    t1 = new Date( );
    clearInterval(t);
    //alert("time spent:" + Math.round( ( t1.getTime( ) - t0.getTime( ) ) / 1000 )  + " secs");
    
    window.location.href="chat_logout.php";
}



function sendDoc( e ){
    if( e.keyCode == 13 || e == "send"){
	var message = document.getElementById( "text" ).value;
	if( message != ""){
	    var xhttp = new XMLHttpRequest( );
	    xhttp.onreadystatechange = function ( ) {     
	    };
	    d = new Date( );
	    time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
	    xhttp.open("GET","messageAppender.php?q=" + "<span>" + "<?php echo$who;?>" + ":</span> " +  message + "<p>" + time + "</p>"  + "&who=<?php echo $who;?>&whom=<?php echo $whom;?>", true);
	    xhttp.send();
	}
	
	document.getElementById( "text" ).value = "";
	d = new Date( );
	time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
	
        var div = document.createElement("div");
	div.className = "myMessages";
	
	div.innerHTML = "<span>" + "<?php echo $who;?>" + ":</span> " + message + "<p>" + time + "</p>";
	document.getElementById( "messageArea" ).appendChild(div);
	 var sHeight = document.getElementById("messageArea").scrollHeight;
         $('#messageArea,html').scrollTop( sHeight );
	  
	
      
	return false;
    }
}

$("#save").on("click", function( ) {
    var bufferId =$("#messageArea").html();
    var who =  "<?php echo $who; ?>";
    var whom = "<?php echo $whom; ?>";
    
      $.ajax({
	  
	  type : "POST",
	  url : "chatSaver.php",
	  data: {id : bufferId, who : who, whom : whom},
	  dataType: "html",	 
      });
});	
 
$("#upload").on("click", function( ) {
     var bufferId =$("#messageArea").html();
     var who =  "<?php echo $who; ?>";
     var whom = "<?php echo $whom; ?>";
    
       $.ajax({
	  
 	  type : "POST",
 	  url : "chatSaver.php",
 	  data: {id : bufferId, who : who, whom : whom},
 	  dataType: "html",
       });
});	

 $(window).unload(function( ) {
     var bufferId =$("#messageArea").html();
     var who =  "<?php echo $who; ?>";
     var whom = "<?php echo $whom; ?>";
    
       $.ajax({
	  
	  type : "POST",
 	  url : "chatSaver.php",
 	  data: {id : bufferId, who : who, whom : whom},
 	  dataType: "html",
       });
	var newCookie = current + "$" + audio.currentTime + "$" + audio.volume + "$";
       document.cookie = newCookie;

 });	
 
 
</script>  
  </body>
</html>
