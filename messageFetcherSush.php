<?php
if( file_exists("FormData/chatSush.txt") )
{
	$myFile = fopen( "FormData/chatSush.txt", "r" );	
	echo fread( $myFile,filesize("FormData/chatSush.txt") );
        fclose($myFile );

	$myFile1 = fopen( "FormData/chatSush.txt", "w" );
        fclose($myFile1);

	
}
?>