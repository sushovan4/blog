<?php

$fileName = "PlayListData/playlist_" . $_GET['q'] . ".html";

if( file_exists($fileName))
{
        $myFile = fopen( $fileName, "r" );
	        echo fread($myFile, filesize($fileName) );
		            fclose($myFile);


}
?>
