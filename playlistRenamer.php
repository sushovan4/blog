<?php
   $old = trim($_POST["oldName"]);
   $new = trim($_POST["newName"]);

   $fileNameOld = "PlayListData/playlist_" . $old . ".html";
   $fileNameNew = "PlayListData/playlist_" . $new . ".html";
   

   if( file_exists( $fileNameOld ) ) {

	$contents = file_get_contents( "PlayListData/list.html" );
	$contents = str_replace( $old, $new, $contents);

	  
      $myFile = fopen("PlayListData/list.html", "w") or die( "failed to open") ;
            fwrite( $myFile, $contents );
             fclose($myFile);

	rename($fileNameOld, $fileNameNew );
   }
   header("location:playSush.html");
    ?>