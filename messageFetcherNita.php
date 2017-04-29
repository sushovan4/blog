<?php
if( file_exists("FormData/chatNita.txt") )
{
	$myFile = fopen( "FormData/chatNita.txt", "r" );	
	echo fread( $myFile,filesize("FormData/chatNita.txt") );
        fclose($myFile );

	$myFile1 = fopen( "FormData/chatNita.txt", "w" );
        fclose($myFile1);

	
}
?>