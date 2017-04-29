<?php session_start(); /* Starts the session */
      /* Check Login form submitted */
      if(isset($_POST['submit'])){
      /* Success: Set session variables and redirect to Protected page  */
      $_SESSION['who']= trim($_POST['who']);
      $_SESSION['whom']= trim($_POST['whom']);
      
      header("location:chat.php");
      
      exit;
      
      } else {
      
      /*Unsuccessful attempt: Set error message */
      
      $msg="<span style='color:red'>Fill out the form</span>";
      
      }
      ?>

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
    <link rel="stylesheet" type="text/css" media="screen" href="style_chat.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap-social.css" />
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    
    
  </head>
  <body>
    
    <div class="container text-center">
      <h2>Welcome to Chat</h2>
      <form id="chatForm" method="POST">
	<div class="form-group">
	  <input class="form-control" id="who" name="who" placeholder="Your Name"
		 type="text" required>
	</div>
	
	<div class="form-group">
	  <input class="form-control" id="whom" name="whom" placeholder="With Whom?"
		 type="text" required>
	</div>
	
	<div>
	  <button class="btn btn-default pull-right" name="submit" type="submit">
	    Chat</button>
	  
	</div>
      </form>
    </div>
    
  </body>
</html>
