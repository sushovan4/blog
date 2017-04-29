<?php
$myFile = fopen( "FormData/sushText.txt", "w" ) or die( "could not open" );
	fclose($myFile );
	unlink( "FormData/sushText.txt" );
   ?>
