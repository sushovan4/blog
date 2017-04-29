<?php	
   $playlist = trim($_POST["playlist"]);
   $song = trim($_POST["song"]);

   $fileName = "PlayListData/playlist_" . $playlist . ".html";
   
   $string1 = "<a class=\"dropdown-item\" href=\"#\">$playlist</a>";
   
   if( $song == "" ) {
	$contents = file_get_contents( "PlayListData/list.html" );
        
	$contents = str_replace($string1, '', $contents );
 
        $myFile1 = fopen("PlayListData/list.html", "w") or die( "failed to open") ;
             fwrite( $myFile1, $contents );
             fclose($myFile1);
	unlink( $fileName );
				
   }

   if( file_exists( $fileName ) ) {

	$contents1 = file_get_contents( $fileName );
        $pos =  strpos( $contents1,$song );
	$contents2 = strrev( substr($contents1, 0, $pos - 11  ) );
        $pos1 =   strpos( $contents2,"=" );
	$url = strrev( substr($contents2, 0, $pos1 - 1   ) );
        $string = "<li class=\"list-group-item\"><a id=\"$url\" href=\"#\">$song</a></li>";
   
        echo $string;
	$contents1 = str_replace($string, '', $contents1 );
        $myFile = fopen($fileName, "w") or die( "failed to open") ;
             fwrite( $myFile, $contents1 );
             fclose($myFile);
	
   }


   header("location:playSush.html");
   ?>