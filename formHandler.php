<?php
   if(isset($_POST['name']) && isset($_POST['email'])) {
   date_default_timezone_set('America/Chicago');
      $data = date("F j, Y, g:i a") . "<br>" . $_POST['name'] . '<br>' . $_POST['email'] . "<br><br>" . nl2br($_POST['message']) . "<br><hr>";
         $ret = file_put_contents('FormData/form_data.txt', $data, FILE_APPEND | LOCK_EX);
	    if($ret === false) {
	       die('There was an error writing this file');
	          }
		     else {

                      	header( "Refresh: 10; index.html" );
                        echo "<h2>Your comments have been submitted successfully. I shall get back to you at my earliest convenience.<br> Thank you.</h2><br><h3> Just hang on to go back.
</h3>";
		
}
			      }
			         else {
				    die('no post data to process');
				    echo "Use your browser's 'Back' navigation tool to go back.";
				       }
				       ?>

