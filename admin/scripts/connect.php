<?php 
			  
 function connect() {
	
	$user = 'root';
    $pass = '';
 	$db = 'cms';
    $host = 'localhost';

   //creating connection do db
   	$result = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");
 
    return $result;
}

function close_connection($connection, $resultSet){
	mysqli_free_result($resultSet);
	mysqli_close($connection);
}

function isLogged(){
	session_start();
	if (empty($_SESSION ['logged'])) {
		return false;
	}
	else{
		return true;
	}
}



 ?>
