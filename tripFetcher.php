<?php

$fileName = "TripData/trip_" . $_GET['q'] . ".html";
$imgFileName = "TripData/img_" . $_GET['q'] . ".html";

if( file_exists($fileName))
{
        $myFile = fopen( $fileName, "r" );
	        echo fread($myFile, filesize($fileName) );
		            fclose($myFile);


}

?>
