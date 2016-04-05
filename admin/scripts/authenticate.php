<?php

$admin_psswd = "a";
$admin_login = "a";
$username =$_POST ['login'];
$password =$_POST ['password'];

if (strcmp($admin_psswd, $password) == 0 && strcmp($admin_login, $username) == 0) {
	session_start();
	$_SESSION ['logged'] = 1;
	$_SESSION ['error'] = "";
	header ( "location:../index.php" );
} else {
	session_start();
	$_SESSION ['error'] = 1;
	header ( "location:../login.php" );
}	

?>