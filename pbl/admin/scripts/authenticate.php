<?php
ini_set('session.save_path', '../../tmp');
session_start();
$admin_psswd = "a";
$admin_login = "a";
$username =$_POST ['login'];
$password =$_POST ['password'];

if (strcmp($admin_psswd, $password) == 0 && strcmp($admin_login, $username) == 0) {
	$_SESSION['logged'] = true;
	unset($_SESSION['error']);
	header ( "location: ../index.php" );
} else {
	$_SESSION ['error'] = "Nesprávne zadané užívateľské meno alebo heslo!";
	header ( "location: ../login.php" );
}
?>