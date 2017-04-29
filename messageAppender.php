<?php	
   $q = $_REQUEST["q"];
   $who = $_REQUEST["who"];
   $whom = $_REQUEST["whom"];
   $fileName = "ChatData/chat_" . $who . "_" . $whom . ".txt";
   
   $myFile = fopen($fileName,"a") or die( "failed to open") ;
   fwrite( $myFile, $q );
   fclose($myFile);
   ?>
