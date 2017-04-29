<?php
 
  $fileName = "PlayListData/list.html";

if( file_exists($fileName) )
{
	$myFile = fopen( $fileName, "r" );	
	echo fread( $myFile,filesize($fileName) );
        fclose($myFile );
}
?>