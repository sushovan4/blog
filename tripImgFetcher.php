<?php

$imgFileName = "TripData/img_" . $_GET['q'] . ".html";

if( file_exists($imgFileName))
{
        $myFile1 = fopen( $imgFileName, "r" );
	        echo fread($myFile1, filesize($imgFileName) );
		            fclose($myFile1);


}


?>
