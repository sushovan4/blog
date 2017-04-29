<?php

$title = $_POST['title'];
$text = $_POST['text'];

$target_dir = "TripData/img/";

$textFileName = 'TripData/trip_' . $title . '.html';
$imgFileName = 'TripData/img_' . $title . '.html';
  
   if( !file_exists( $textFileName ) ) {
	
        $myFile = fopen("TripData/list.html", "a") or die( "failed to open") ;
        $string = "<a class=\"dropdown-item\">$title</a>";
             fwrite( $myFile, $string );
             fclose($myFile);
   }

   
             $myFile1 = fopen($textFileName, "w") or die( "failed to open") ;
             fwrite( $myFile1, $text );
             fclose($myFile1); 

   //Image upload
   if( isset($_POST['submit']) && isset($_FILES['f0']) ){ 
   $uploadOk = 1;
   $target_file = $target_dir . basename($_FILES["f0"]["name"]);
   $string = "<div class=\"item active\"><img src=\"" . $target_file . "\"></div>";
   
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   // Check if image file is a actual image or fake image
   $check = getimagesize($_FILES["f0"]["tmp_name"]);
   if($check !== false) {
   //echo "File is an image - " . $check["mime"] . ".";
   $uploadOk = 1;
   move_uploaded_file($_FILES["f0"]["tmp_name"], $target_file);
   $myFile3 = fopen($imgFileName,"a") or die( "failed to open") ;
   fwrite( $myFile3, $string );
   fclose($myFile3);
    } else {
      echo "File is not an image.";
         $uploadOk = 0;
    } }

   if( isset($_POST['submit']) && isset($_FILES['f1']) ){ 
   $uploadOk = 1;
   $target_file = $target_dir . basename($_FILES["f1"]["name"]);
   $string = "<div class=\"item\"><img src=\"" . $target_file . "\"></div>";
   
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   // Check if image file is a actual image or fake image
   $check = getimagesize($_FILES["f1"]["tmp_name"]);
   if($check !== false) {
   //echo "File is an image - " . $check["mime"] . ".";
   $uploadOk = 1;
   move_uploaded_file($_FILES["f1"]["tmp_name"], $target_file);
   $myFile3 = fopen($imgFileName,"a") or die( "failed to open") ;
   fwrite( $myFile3, $string );
   fclose($myFile3);
    } else {
      echo "File is not an image.";
         $uploadOk = 0;
    } }

   if( isset($_POST['submit']) && isset($_FILES['f2']) ){ 
   $uploadOk = 1;
   $target_file = $target_dir . basename($_FILES["f2"]["name"]);
   $string = "<div class=\"item\"><img src=\"" . $target_file . "\"></div>";
   
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   // Check if image file is a actual image or fake image
   $check = getimagesize($_FILES["f2"]["tmp_name"]);
   if($check !== false) {
   //echo "File is an image - " . $check["mime"] . ".";
   $uploadOk = 1;
   move_uploaded_file($_FILES["f2"]["tmp_name"], $target_file);
   $myFile3 = fopen($imgFileName,"a") or die( "failed to open") ;
   fwrite( $myFile3, $string );
   fclose($myFile3);
    } else {
      echo "File is not an image.";
         $uploadOk = 0;
    } }

   if( isset($_POST['submit']) && isset($_FILES['f3']) ){ 
   $uploadOk = 1;
   $target_file = $target_dir . basename($_FILES["f3"]["name"]);
   $string = "<div class=\"item\"><img src=\"" . $target_file . "\"></div>";
   
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   // Check if image file is a actual image or fake image
   $check = getimagesize($_FILES["f3"]["tmp_name"]);
   if($check !== false) {
   //echo "File is an image - " . $check["mime"] . ".";
   $uploadOk = 1;
   move_uploaded_file($_FILES["f3"]["tmp_name"], $target_file);
   $myFile3 = fopen($imgFileName,"a") or die( "failed to open") ;
   fwrite( $myFile3, $string );
   fclose($myFile3);
    } else {
      echo "File is not an image.";
         $uploadOk = 0;
    } }

   if( isset($_POST['submit']) && isset($_FILES['f4']) ){ 
   $uploadOk = 1;
   $target_file = $target_dir . basename($_FILES["f4"]["name"]);
   $string = "<div class=\"item\"><img src=\"" . $target_file . "\"></div>";
   
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   // Check if image file is a actual image or fake image
   $check = getimagesize($_FILES["f4"]["tmp_name"]);
   if($check !== false) {
   //echo "File is an image - " . $check["mime"] . ".";
   $uploadOk = 1;
   move_uploaded_file($_FILES["f4"]["tmp_name"], $target_file);
   $myFile3 = fopen($imgFileName,"a") or die( "failed to open") ;
   fwrite( $myFile3, $string );
   fclose($myFile3);
    } else {
      echo "File is not an image.";
         $uploadOk = 0;
    } }

    
   header('Location: tripEditor.html');
   ?>

