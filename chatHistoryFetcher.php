<?php
 $who = $_REQUEST["who"];
 $whom = $_REQUEST["whom"];
 
$fileName = "ChatData/chatHistory_" . $who . "_" . $whom . ".html";

if( file_exists($fileName) )
{
	$myFile = fopen( $fileName, "r" );	
	echo fread( $myFile,filesize($fileName) );
        fclose($myFile );

	$myFile1 = fopen( $fileName, "w" );
        fclose($myFile1);	
}
?>