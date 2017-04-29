<?php	
   $url = trim($_POST["url"]);
   $playlist = trim($_POST["playlist"]);
   $song = trim($_POST["song"]);
   $fileName = "PlayListData/playlist_" . $playlist . ".html";
   
   $string = "<li class=\"list-group-item\"><a id=\"$url\" href=\"#\">$song</a></li>";
   echo $playlist;
   if( !file_exists( $fileName ) ) {
        $myFile1 = fopen("PlayListData/list.html", "a") or die( "failed to open") ;
        $string1 = "<a class=\"dropdown-item\" href=\"#\">$playlist</a>";
             fwrite( $myFile1, $string1 );
             fclose($myFile1);
   }

   
             $myFile = fopen($fileName, "a") or die( "failed to open") ;
             fwrite( $myFile, $string );
             fclose($myFile);
   
   header("location:playSush.html");
   ?>
