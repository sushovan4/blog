<?php
   session_start(); /* Starts the session */
      if(!isset($_SESSION['who'])){
         header("location:chat_login.php");
	    exit;
	       }

	          $who = $_SESSION['who'];
		     $whom = $_SESSION['whom'];
		       

   if( isset($_POST['submit']) && isset($_FILES["fileToUpload"])){
      $target_dir = "ChatData/";
         $imgFileName = basename($_FILES["fileToUpload"]["name"]);
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	       $uploadOk = 1;
	          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		     // Check if image file is a actual image or fake image
		        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			   if($check !== false) {
			      //echo "File is an image - " . $check["mime"] . ".";
			                                               $uploadOk = 1;
								          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
									     $fileName = "ChatData/img_" . $who . "_" . $whom . ".txt";

   $myFile = fopen($fileName,"a") or die( "failed to open") ;
      fwrite( $myFile, $imgFileName );
         fclose($myFile);
	$_SESSION['lastUpload'] = $imgFileName;
   //echo "<script type='text/javascript'>alert("The photo was sent successfully!");</script>";
   header("location:chat.php");

   } else {
      echo "File is not an image.";
         $uploadOk = 0;
	    }
	       }
	          ?>
