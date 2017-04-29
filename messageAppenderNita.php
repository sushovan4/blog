<?php	
   $q = $_REQUEST["q"];
   
   $myFile = fopen("FormData/chatNita.txt","a") or die( "failed to open") ;
   fwrite( $myFile, $q );
   fclose($myFile);
   ?>
