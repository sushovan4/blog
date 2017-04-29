<?php	
$song = trim($_GET['song']);
$dir = "PlayListData";
$files = scandir( $dir );

for( $i = 2; $i < count( $files ); $i++ )
  {
    if( $files[i] != "list.html" ){
      $contents = file_get_contents( "PlayListData/" . $files[$i] );
      if ( stripos($contents, $song) !== false) {
	echo substr($files[$i],9,-5) . "<br>";
      }
    }
  }


?>