<?php
	
   $playlist = trim($_POST["playlist"]);
   $old = trim($_POST["oldName"]);
   $new = trim($_POST["newName"]);
   
   $fileName = "PlayListData/playlist_" . $playlist . ".html";
   
//   $string1 = "<a class=\"dropdown-item\" href=\"#\">$playlist</a>";
   
//    if( $song == "" ) {
// 	$contents = file_get_contents( "PlayListData/list.html" );
// 	$contents = str_replace($string1, '', $contents );
 
//         $myFile1 = fopen("PlayListData/list.html", "w") or die( "failed to open") ;
//              fwrite( $myFile1, $contents );
//              fclose($myFile1);
// 	unlink( $fileName );
				
//    }

   if( file_exists( $fileName ) ) {

	$contents = file_get_contents( $fileName );
	$contents = str_replace( $old, $new, $contents);
    
        $myFile = fopen($fileName, "w") or die( "failed to open") ;
            fwrite( $myFile, $contents );
             fclose($myFile);
	
   }

   header("location:playSush.html");
   ?>