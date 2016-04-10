<?php



	$user = 'root';
    $pass = '';
 	$db = 'pbl';
    $host = 'localhost';
   	$resultdb = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");
 	return $resultdb;










?>