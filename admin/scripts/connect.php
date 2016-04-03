<?php 
			  
 function connect() {
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "web";
	$tbl_name = "";
	
	$db = @mysql_connect ("$host", "$username", "$password") or die ("cannot connect to DB");
	@mysql_select_db ("$db_name", $db) or die ("cannot select DB");

    mysql_query('SET NAMES \'utf8\'');
    mysql_query('SET CHARACTER_SET \'utf8\'');
    return $db;
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
