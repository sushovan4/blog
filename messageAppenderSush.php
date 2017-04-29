<?php	
   $q = $_REQUEST["q"];
   
   $myFile = fopen("FormData/chatSush.txt","a") or die( "failed to open") ;
   fwrite( $myFile, $q );
   fclose($myFile);
   ?>
