<?php
$who = $_REQUEST["who"];
$whom = $_REQUEST["whom"];

$fileName = "ChatData/img_" . $whom . "_" . $who . ".txt";

if( file_exists($fileName))
{
	$myFile = fopen( $fileName, "r" );	
	echo fread( $myFile, filesize($fileName) );
        fclose($myFile);

	$myFile1 = fopen( $fileName, "w" );
        fclose($myFile1);	
}
?>