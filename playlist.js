//To load the list of playlists
function loadList( )
{   
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
	    var text = this.responseText;
	    if( text != ""){
		document.getElementById( "lists" ).innerHTML = text;
	    }	   
	}
    };
    
    xhttp.open("GET", "listFetcher.php", true);
    xhttp.send();
    
}


function loadPlaylist(name)
{
   
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
	    var text = this.responseText;
	    if( text != ""){
		document.getElementById( "currentPlaylist" ).innerHTML = text;
		displayPlaylist( name );
		showCurrent( );
		var url = $("#currentPlaylist").find("A")[targetSong].getAttribute("id");
		$("#audio").attr("src",  url );
		$("#audio").prop('currentTime', time);
		$("#audio").trigger('load');
		setTimeout( mediaErrorCheck, 10000 );
		
		//play( );
	    }
	}
    };
    
    xhttp.open("GET", "playlistFetcher.php?q=" + name, true);
    xhttp.send();
    
}

function searchSong( )
{ 
    var query =  document.getElementById("querySong").value;  
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
	    var text = this.responseText;
	    if( text != ""){
		document.getElementById( "found" ).innerHTML = "Yeh! Found these.:<br>" + text;
	    }
            else	{
		document.getElementById( "found" ).innerHTML = "Sorry, no playlist found!";
            }
		document.getElementById( "querySong" ).value = ""; 
	}
    };
    
    xhttp.open("GET", "playlistSearch.php?song=" + query, true);
    xhttp.send();
    
}


function showPlaylist(name)
{
   
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
	    var text = this.responseText;
	    if( text != ""){
    document.getElementById( "targetPlaylist" ).innerHTML = text;
     displayPlaylist( targetPlaylist );
     showTarget( );
  	    }
	}
    };
    
    xhttp.open("GET", "playlistFetcher.php?q=" + name, true);
    xhttp.send();
    
}

function showCurrent( ) {
	document.getElementById( "targetPlaylist" ).style.display = "none";
	document.getElementById( "currentPlaylist" ).style.display = "";

}
function showTarget( ) {
	document.getElementById( "currentPlaylist" ).style.display = "none";
	document.getElementById( "targetPlaylist" ).style.display = "";
}

function setCookie(cname, cvalue) {
       document.cookie = cname + "=" + cvalue + ";";
} 

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
} 


function checkCookie() {
    currentPlaylist = getCookie("playlist");
    currentSong = parseInt( getCookie("song") );
    time = parseFloat( getCookie("time") );
    vol = parseFloat( getCookie("volume") );

    if (currentPlaylist == "") {
        currentSong = 0;         
        vol = 0.2;
        time = 0;
        return false;
     }

      else {
       return true;
     }

   
}

function runPrevious( ){
    
if ( loopOn ){ targetSong = currentSong; }
else{
    if( !shuffleOn && ( currentSong > 0  ) ){
	targetSong = currentSong - 1;
 
    }
    else if( !shuffleOn && ( currentSong == 0 ) ){
	targetSong = playlistLen - 1;
    }

    else{
	targetSong = Math.floor( Math.random() * ( playlistLen - 1 ) );
    }
}    
  

   var url = $("#currentPlaylist").find("A")[targetSong].getAttribute("id");
    $("#audio").attr("src",  url );
    time = 0; dur = 0; durOut = "--:--";document.getElementById( "display" ).innerHTML = "please wait while loading....";
    
    //play( );
    //$("#currentPlaylist").find("LI")[currentSong].setAttribute("class","list-group-item");
    //$("#currentPlaylist").find("LI")[targetSong].setAttribute("class","list-group-item myActive");

    $("#audio").trigger( 'load' );
    //currentSong = targetSong;

}




function runNext( ){ 
    var string = '<span class="glyphicon glyphicon-stop"></span>';
    document.getElementById("status").innerHTML = string;
 
if ( loopOn ){ targetSong = currentSong; }
else{
    if( !shuffleOn && ( currentSong < playlistLen - 1  ) ){
	targetSong = currentSong + 1;
 
    }
    else if( !shuffleOn && ( currentSong == playlistLen - 1 ) ){
	targetSong = 0;
    }

    else{
	targetSong = Math.floor( Math.random() * ( playlistLen - 1 ) );
    }
}    
    var url = $("#currentPlaylist").find("A")[targetSong].getAttribute("id");
    $("#audio").attr("src",  url );
    time = 0; dur = 0; durOut = "--:--";document.getElementById( "display" ).innerHTML = "please wait while loading....";
    
    $("#audio").trigger( 'load' );
}

function loop( ){
    if( loopOn ){
	document.getElementById("audio").loop = false;
	document.getElementById("loopDisplay").innerHTML = "";
	loopOn = false;
    }
    else {
	document.getElementById("audio").loop = true;
	document.getElementById("loopDisplay").innerHTML = '<span class="glyphicon glyphicon-repeat"></span>';	
	loopOn = true;
    }
}

function shuffle( ){
    if( shuffleOn ){
	document.getElementById("shuffleDisplay").innerHTML = "";
	shuffleOn = false;
    }
    else {
	document.getElementById("shuffleDisplay").innerHTML = '<span class="glyphicon glyphicon-random"></span>';	
	shuffleOn = true;
    }
}


function up(){
    var volume = $("#audio").prop("volume")+0.1;
    if(volume >1){
        volume = 1;
    }
    $("#audio").prop("volume",volume);
    document.getElementById( "volDisplay" ).innerHTML = Math.round( volume*100 ) + "%";
    setTimeout(function( ){document.getElementById( "volDisplay" ).innerHTML = "";} , 500 );
}
 
function down(){
    var volume = $("#audio").prop("volume")-0.1;
    if(volume <0){
        volume = 0;
    }
    $("#audio").prop("volume",volume);
    document.getElementById( "volDisplay" ).innerHTML = Math.round( volume*100 ) + "%";
    setTimeout(function( ){document.getElementById( "volDisplay" ).innerHTML = "";} , 500 );
}

function play( ) {
    if( document.getElementById("audio").readyState > 2 ){
        dur = document.getElementById("audio").duration
	durOut = Math.round( dur/60 ) + ":" + pad( Math.round( dur % 60 ), 2);

	$("#audio").trigger('play');
	$("#currentPlaylist").find("LI")[currentSong].setAttribute("class", "list-group-item");
	$("#currentPlaylist").find("LI")[targetSong].setAttribute("class", "list-group-item myActive");
	playlistLen = $("#currentPlaylist").find("A").length;
	currentSong = targetSong;
        showTitle( );
	var string = '<span class="glyphicon glyphicon-play"></span>';
	document.getElementById("status").innerHTML = string;
    }
    else{
	document.getElementById( "lastDiv" ).innerHTML = '<span class="glyphicon glyphicon-remove-circe" style="color: red;"></span>';
        targetSong = currentSong;
	var url =  $("#currentPlaylist" ).find("A")[currentSong].getAttribute("id");
	$("#audio").attr("src", url);

	$("#audio").prop("currentTime", 0); //This is throwing exception
	$("#audio").trigger('load');

    }
   
}

function mediaErrorCheck( ) {
    if    ( document.getElementById("audio").readyState < 3 ){
	document.getElementById( "status" ).innerHTML =  '<span class="glyphicon glyphicon-remove" style="color: red;"></span>';
	document.getElementById( "display" ).innerHTML = "Something wrong. May be a broken link/no internel connection.......";
 document.getElementById( "lastDiv" ).innerHTML = '<span class="glyphicon glyphicon-remove-circe" style="color: red;"></span>';
	document.getElementById( "timeContainer" ).innerHTML = "--:--/--:--";
    }
}


function pause( ){
    if( document.getElementById( "audio" ).readyState > 2  ) {
	$( "#audio").trigger('pause');
	var string = '<span class="glyphicon glyphicon-pause"></span>';
        document.getElementById("status").innerHTML = string;
    }
    }

function forward(){
    var currentT = $("#audio").prop("currentTime");
    var targetT = currentT + 10; 
    if ( targetT < dur){
        $("#audio").prop("currentTime", targetT);;
    }
	else{
	runNext( );
   }
}


function backward(){
    var currentT = $("#audio").prop("currentTime");
    var targetT = currentT - 10;
    if( currentT > 0){
        $("#audio").prop("currentTime", targetT );;
    }
	else{
	runPrevious( );
   }
}


function showTitle( ){
    document.getElementById("display").innerHTML = $("#currentPlaylist").find("A")[currentSong].innerHTML;
}

function showTime( ){
       	var t = setInterval( checkTime,500); 
       
}

function checkTime( ){
	document.getElementById("timeContainer").innerHTML = 
        Math.round( $("#audio").prop('currentTime')/60 ) + ":" + 
        pad( Math.round( $("#audio").prop('currentTime')%60 ), 2) + "/" + durOut;
}


function displayPlaylist( name ){
    document.getElementById("playlistDisplay").innerHTML = name;
}

function pad(num, size) {
    var s = "0" + num;
    return s.substr(s.length-size);
}


function downloadCurrent( ){
    var url = $("#currentPlaylist").find("A")[currentSong].getAttribute("id");
    var win = window.open(url, '_blank');
    win.focus();
    
}

function clearSearch( ) {
 	document.getElementById( "found" ).innerHTML = "";
	document.getElementById( "querySong" ).value = "";
}


 function setTimer( ) {
       if(  timer > 0){
       clearTimeout( timerHandle );clearInterval(interval);}

       timer = timer + 1;

       if( timer < 5 ){
       var countDown = timer*60;
       document.getElementById("timer").setAttribute("class","btn btn-danger sleepAnim");
      
       interval = setInterval(function( ){

       document.getElementById("timer").innerHTML = 
	Math.floor( countDown/60 ) + ":" + pad( Math.floor( countDown%60 ), 2);
       countDown = countDown - 1;
       } , 1000);
       timerHandle = setTimeout(function(){ clearInterval(interval); pause( ); timer = 0;
       document.getElementById("timer").setAttribute("class","btn btn-success btn-xs");
      document.getElementById("timer").innerHTML = "Sleep";}, (countDown + 2 ) * 1000 );
       }
       else{
       timer = 0;
      document.getElementById("timer").innerHTML = "Sleep";
      document.getElementById("timer").setAttribute("class","btn btn-success btn-xs");

    }


}


