<?php

$data = $_POST['id'];
$who  = $_POST['who'];
$whom = $_POST['whom'];
$fileName = "ChatData/chatHistory_" . $who . "_" . $whom . ".html";

$handle = fopen($fileName, "w+");
if($handle)
{
	
if(!fwrite($handle,$data ))
echo "danger";	    
}    		    
     
?>   