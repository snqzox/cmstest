<?php
ini_set('session.save_path', 'w:\Temp');
session_start();
$admin_psswd = "2Met2ket2";
$admin_login = "admin";
$username =$_POST ['login'];
$password =$_POST ['password'];

if (strcmp($admin_psswd, $password) == 0 && strcmp($admin_login, $username) == 0) {
	$_SESSION['logged'] = true;
	unset($_SESSION['error']);
	header ( "location: ../index.php" );
} else {
	$_SESSION ['error'] = "<p>Nesprávne zadané užívateľské meno alebo heslo!<p>";
	header ( "location: ../login.php" );
}
?>