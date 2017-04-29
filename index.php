<!DOCTYPE HTML>
<html  xml:lang="en" >
  
  <head>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Modern+Antiqua" />
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Modern Antiqua' type='text/css' />
    
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
    
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sush</title>
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="style_new.css" /> -->
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap-social.css" />
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    
    
  </head>
  
  <body>  
  

   	 <?php
    	// define variables and set to empty values	
   	 $name = $email = $message = "";	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	$name = test_input($_POST["name"]);
  	$email = test_input($_POST["email"]);
        $message = test_input($_POST["message"]);
  
	}

	function test_input($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
	}
	?>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
    	<div class="navbar-header">
    	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    	    <span class="icon-bar"></span>
    	    <span class="icon-bar"></span>
    	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	   
    	  </button>
    	  <a class="navbar-brand" href="index.html">Sushovan Majhi</a>
    	</div>
    	<div class="collapse navbar-collapse" id="myNavbar">
    	  <ul class="nav navbar-nav navbar-right">
    	    <li class="active"><a href="index.html">Home</a></li>
    	    <li><a href="Sush_CV.pdf">CV</a></li>
    	    <li><a href="academic.html">Academic</a></li>
    	    <li><a href="personal.html">Personal</a></li>
    	    <li><a href="others.html">Misc</a></li>
	    <li><a href="private.php">Private Login</a></li>
    	    <li><a target="_blank" href="https://www.facebook.com/SushovanMajhi"><img src="facebook.png"
										      width="20%"></a></li>
    	  </ul>
	  
   	</div>
	<div class="scroll-progress-container">
	  <div class="scroll-progress"></div>
	</div>
      </div>
    </nav>
    
    
    <div class="container text-center bg-1">
      <div class="row">
    	<div class="col-sm-4">
    	  <img src="myPic.jpg" width="65%" class="img-rounded" alt="Sush">
    	</div>
	
    	<div class="col-sm-8">
    	  <h2>About Me</h2><br>
    	  <h4 class="text-left">I am a third year PhD student at the Mathematics department of Tulane University.
	    I am currently working towards my dissertation.</h4>
	  
    	  <p class="slideanim text-left"> I am primarily interested in <strong>Applied Topology</strong>
    	    and
    	    <strong>Computational Geometry</strong>. Right now,
    	    I am working on a theoretical and an applied project.</p>
	  <p class="slideanim text-left">The first one falls under the umbrella of <strong>Random Topology</strong>, which involves
	    considering topological invariants as random variables and describing their distributions.</p>
	  <p class="slideanim text-left"> My other project deals with analyzing big data(prostate cancer patient data) using tools from
	    <strong>Topological Data Analysis(TDA)</strong> and
	    <strong>Machine Learning</strong>. 
   	  </p>
    	</div>
      </div>
    </div>
    
    <!-- Contact Section -->
    <div class="container bg-grey text-center">
      <span class="glyphicon glyphicon-globe logo-small slideanim"></span>
      <h2><span>Contact Me</span></h2>
      
      <div class="row">
    	<div class="col-md-5 text-left">
      	  <p><span class="glyphicon glyphicon-map-marker"></span> 7532 Hampson Street, New Orleans, LA, USA, 70118</p>
      	  <p><span class="glyphicon glyphicon-phone"></span> Phone: +1 504 616 3661</p>
    	  <p><span class="glyphicon glyphicon-envelope"></span> Email: smajhi@tulane.edu</p>
      	</div>
	
    	<div class="col-md-7 slideanim">
	  <form id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	    <div class="form-group">
    	      <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>	    
	    </div>
	    <div class="form-group">
	      <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
    	    </div>
	    <div class="form-group">
	      <textarea class="form-control" id="message" name="message" placeholder="Comment" rows="4"></textarea><br>
	    </div>
	    
	    <div>
	      <button class="btn btn-default pull-right" name="submit" type="submit">Send</button>
	    </div>
	  </form>
	  
	</div>
      </div>
    </div>
    

 
    <!-- Map Section -->
    <div>
      <div class="container bg-black">
    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.3567040885723!2d-90.13144464924352!3d29.94041683034536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8620a517909ae343%3A0x955a28b5344a9252!2s7532+Hampson+St%2C+New+Orleans%2C+LA+70118!5e0!3m2!1sen!2sus!4v1471701645838" width="100%" height="150%" frameborder="1" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
    
    <!-- Copyright -->
    <div class="container-fluid text-center">
      <h4>  &copy; 2016 Sushovan Majhi</h4>
    </div>
    
    <!-- Slide Scripts -->
    <script>
    $(document).ready(function(){
	// Add smooth scrolling to all links in navbar + footer link
	$(".navbar a, footer a[href='#myPage']").on('click', function(event) {
	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
		// Prevent default anchor click behavior
		event.preventDefault();
		
		// Store hash
		var hash = this.hash;

		// Using jQuery's animate() method to add smooth page scroll
		// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
		$('html, body').animate({
		    scrollTop: $(hash).offset().top
		}, 900, function(){
		    
		    // Add hash (#) to URL when done scrolling (default click behavior)
		    window.location.hash = hash;
		});
	    } // End if
	});
	
	$(window).scroll(function() {
	    $(".slideanim").each(function(){
		var pos = $(this).offset().top;
		
		var winTop = $(window).scrollTop();
		if (pos < winTop + 600) {
		    $(this).addClass("slide");
		}
	    });
	});
    })
</script>
    
 </body>
</html>
