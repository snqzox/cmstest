<?php
function connect(){

	$user = 'root';
    $pass = '';
 	$db = 'pbl';
    $host = 'localhost';
   	$resultdb = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");
 
 	return $resultdb;
}

 function test_input($data) {
 
   $data = trim($data);
   $data = str_replace(array("\\r","\\n"),"",$data);
   $data = stripslashes($data);

   return $data;
}
   
function close_connection($connection, $resultSet){
	mysqli_free_result($resultSet);
	mysqli_close($connection);
}
?>