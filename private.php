<?php session_start(); /* Starts the session */
      if(!isset($_SESSION['Username'])){
      header("location:login.php");
      exit;
      }
      ?>

<!DOCTYPE = html>
<html  xml:lang="en" >
  
  <head>
    
    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    
    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> -->

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Modern+Antiqua" />
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Modern Antiqua' type='text/css' />
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sush</title>
  
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
     <style>.dropdown-menu a {display: block; }</style>
     <script>
      $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
      format: 'mm/dd/yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
      };
      date_input.datepicker(options);
      })
    </script>
  
    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-82908020-1', 'auto');
      ga('send', 'pageview');

    </script>
    

  </head>
  
  <body>
    
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
    	<div class="navbar-header">
    	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    	    <span class="icon-bar"></span>
    	    <span class="icon-bar"></span>
    	    <span class="icon-bar"></span>
    	  </button>
    	  <a class="navbar-brand" href="index.html">Sushovan Majhi</a>
    	</div>
    	<div class="collapse navbar-collapse" id="myNavbar">
    	  <ul class="nav navbar-nav navbar-right">
    	    <li><a href="index.html">Home</a></li>
    	    <li><a href="Sush_CV.pdf">CV</a></li>
    	    <li><a href="academic.html">Academic</a></li>
    	    <li><a href="personal.html">Personal</a></li>
	    <li><a href="others.html">Misc</a></li>
            <li class="active"><a href="private.php">Private Login</a></li>	
	    <li><a target="_blank" href="https://www.facebook.com/SushovanMajhi"><img src="facebook.png"
										      width="20%"></a></li>
    	  </ul>
    	</div>
    </nav>
    
    <div class="container text-center">
     <?php echo "<h2>" . $_SESSION['Username'] . "</h2>"; ?>  <h4>welcome to Sush's secure portal</h4><a href="logout.php"><button class="btn btn-primary">Logout</button></a><br>
	<?php echo "Your IP is " . $_SERVER['REMOTE_ADDR']; ?><br></div>
    
    <div class="container text-center bg-coral"><h2>Editor</h2>
<div class="btn-group" role="group">
<button class="btn btn-success btn-xs" onClick="putHeader()">Header</button>
<button class="btn btn-success btn-xs" onClick="putPara()">Paragraph</button>
<button class="btn btn-success btn-xs" onClick="putColor()">Color</button>
<button class="btn btn-success btn-xs" onClick="putBreak()">Next Line</button>
</div>

<div class="btn-group">
	      <button id="listGroup" type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Trips<span class="glyphicon glyphicon-chevron-down"></span>
	      </button>
	      <div  id="tripListEdit" class="dropdown-menu" aria-labelledby="listGroup">
	      </div>
	    </div>
	   
  <form action="tripSubmit.php" method="post" enctype="multipart/form-data">
   <input type="input" name="title" id="title" placeholder="Title" required/><br/>
   <textArea name="text" id="text" style="width:100%;" rows="15" placeholder="write here"></textArea>
    <input type="file" id="f0" name="f0"/>  
    <input type="file" id="f1" name="f1"/>   
    <input type="file" id="f2" name="f2"/>   
    <input type="file" id="f3" name="f3"/>   
    <input type="file" id="f4" name="f4"/>   
  <button type="submit" name="submit" class="btn btn-success btn-xs">Submit</button></form>
   </div>

    <div class="container text-center bg-black"><h2>Viewer</h2>
       <div class="btn-group">
	      <button id="listGroup1" type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Trips<span class="glyphicon glyphicon-chevron-down"></span>
	      </button>
	      <div  id="tripListShow" class="dropdown-menu" aria-labelledby="listGroup1">
	      </div>
	    </div>
	
	<div id="tripReader" style="background:white; width:100%;text-align:left;"></div>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    
		    <!-- Wrapper for slides -->
		    <div id="album" class="carousel-inner" role="listbox">
		      		      
		     </div>
		    
		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>

        </div>

<script>
loadList( );
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
		document.getElementById( "tripListShow" ).innerHTML = text;
		document.getElementById( "tripListEdit" ).innerHTML = text;
		

	    }	   
	}
    };
    
    xhttp.open("GET", "tripListFetcher.php", true);
    xhttp.send();
    
}

function loadTrip(name)
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
		document.getElementById( "tripReader" ).innerHTML = text;
		
		
	    }
	}
    };
    
    xhttp.open("GET", "tripFetcher.php?q=" + name, true);
    xhttp.send();
    
}
function loadTripImg(name)
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
		document.getElementById( "album" ).innerHTML = text;
		
		
	    }
	}
    };
    
    xhttp.open("GET", "tripImgFetcher.php?q=" + name, true);
    xhttp.send();
    
}


function loadTripEdit(name)
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
		document.getElementById( "text" ).innerHTML = text;
		document.getElementById( "title" ).value = name;
		

		
	    }
	}
    };
    
    xhttp.open("GET", "tripFetcher.php?q=" + name, true);
    xhttp.send();
    
}


      $('#tripListShow').bind('click',function(event){
      var link = event.target;
      tripName =  link.text;
      loadTrip( tripName );
      loadTripImg( tripName );
      });

      $('#tripListEdit').bind('click',function(event){
      var link = event.target;
      tripName =  link.text;
      loadTripEdit( tripName );
      });

function putHeader( ) {
	document.getElementById("text").innerHTML = document.getElementById("text").innerHTML + '<h4 style="color:black;"></h4>';
}
function putPara( ) {
	document.getElementById("text").innerHTML = document.getElementById("text").innerHTML + '<p style="color:black;"></p>';
}
function putColor( ) {
	document.getElementById("text").innerHTML = document.getElementById("text").innerHTML + '<span style="color:black;"></span>';
}
function putBreak( ) {
	document.getElementById("text").innerHTML = document.getElementById("text").innerHTML + '<br>';
}
</script>
    
    <div class="container bg-2 text-center">
      <h2>Read Comments</h2>
      <button class="btn btn-primary " type="button" data-toggle="collapse" data-target="#CommentReader" name="submit"  onclick="loadFormDoc()" >Read Comments</button>
      
      <br><br>
      <div id="CommentReader" class="collapse" style="background-color: white;
	   margin-top: 3%;
	   padding:3%;
	   border: 3px solid pink;
	   border-radius: 10px;">
	<h4 class="text-left" id="reader0"></h4>
      </div>
    </div>
    
      <div class="container text-center bg-1">
	<h2>My Diary</h2>
      <input id="date" name="date" placeholder="MM/DD/YYYY" type="text"></input>
      <button class="btn btn-primary " name="submit"  onclick="loadDoc()">Search</button>
      
      <br><br>
      <button id="button-1" type="button" data-toggle="collapse" data-target="#reader1" class="btn btn-success" style="visibility:hidden;">Read</button>
      <div id="reader1" class="collapse" style="background-image: url(tile.jpg);
	   background-repeat: repeat-xy;
	   margin-top: 3%;
	   padding:3%;
	   border: 3px solid lightgreen;
	   border-radius: 10px;">
	<h4 id="myDate" class="text-right" style="border-bottom: 2px solid purple"></h4><br>
	<h4 id="reader" class="bangla text-left"></h4>
      </div>
      
    </div>
    <div class="container text-center bg-2">
      <h2>Nita's Stuff</h2>    
	<div class="row">
          <div class="col-sm-4">
            <img src="nita1.jpg" width="60%" class="img-circle" alt="Nita">
          </div>
	  
          <div class="col-sm-8">
	    
	    <div id="menu">
	      <div class="panel list-group">
		<a class="list-group-item" data-toggle="collapse" data-target="#sm" data-parent="#menu">Poems<span class="label label-info">1</span>
		  <span class="glyphicon glyphicon-envelope pull-right"></span></a>
		<div id="sm" class="sublinks collapse">
		  <a href="NitaKobita.pdf" class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span>Bengali</a>
		  <a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span>English</a>
		</div>
		
		<a class="list-group-item" data-toggle="collapse" data-target="#sl" data-parent="#menu">Pictures<span class="glyphicon glyphicon-tag pull-right"></span></a>
		<div id="sl" class="sublinks collapse">
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		      <li data-target="#myCarousel" data-slide-to="3"></li>
		      <li data-target="#myCarousel" data-slide-to="4"></li>
		    </ol>
		    
		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
		      <div class="item active">
			<img src="img/Party/1.jpg" alt="Coocking Dal">
		      </div>
		      
		      <div class="item">
			<img src="img/Party/2.jpg" alt="">
		      </div>

		      <div class="item">
			<img src="img/Party/3.jpg">
		      </div>

		      <div class="item">
			<img src="img/Party/4.jpg" alt="Flower">
		      </div>

		      <div class="item">
			<img src="img/Party/5.jpg" alt="Flower">
		      </div>
		      
		    </div>
		    
		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
		</div>
		<a class="list-group-item">Others<span class="glyphicon glyphicon-stats pull-right"></span></a>
	      </div>
	    </div>
	  </div>
	</div>
	
    </div>

    <div class="container text-center"> <iframe width="560" height="315" src="https://www.youtube.com/embed/6VLl_o7EW5k" frameborder="0" allowfullscreen></iframe></div>	
    <script>
      function loadDoc() {
      var fullDate = document.getElementById("date").value;
      var month = fullDate.slice(0,2);
      var date = fullDate.slice(3,5);
      var year = fullDate.slice(6,10);
      var file = "Diary/" + month + "_" + date + "_" + year + ".txt";
      
      $.ajax({
      url:file,
      type:'HEAD',
      error: function()
      {
      alert("Nothing Found for This Date!");
      },
      success: function()
      {

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {  
      document.getElementById("button-1").style.visibility = "visible";
      <!-- document.getElementById("reader1").style.visibility = "visible"; -->
      document.getElementById("myDate").innerHTML = fullDate;
      document.getElementById("reader").innerHTML = this.responseText;
      }
      };
      xhttp.open("GET", file, true);
      xhttp.send();
      }
      
      });
    }  
    </script>
    
    <script>
      function loadFormDoc() {
      var file = "FormData/form_data.txt";
      
      $.ajax({
      url:file,
      type:'HEAD',
      error: function()
      {
      alert("Nothing Found");
      },
      success: function()
      {

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {  
      document.getElementById("reader0").innerHTML = this.responseText;
      }
      };
      xhttp.open("GET", file, true);
      xhttp.send();
      }
      
      });
    }  
    </script>
      
    
    
    <div class="container text-center">
      <h4>  &copy; 2016 Sushovan Majhi</h4>
    </div>
    
  </body>
</html>
