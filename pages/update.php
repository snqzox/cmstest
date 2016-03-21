<?php

$user = 'root';
$pass = '';
$db = 'web';
$host = 'localhost';
$table = 'pages';	
	
//creating connection do db
$db = new mysqli($host, $user, $pass, $db) or die("unable to connect");


//getting information post by user
$id=$_POST['id'];
$title=$_POST['title'];
$description=$_POST['description'];



//MySQL injection
//$nazov = stripslashes($nazov);
//$popis = stripslashes($popis);
//$cena = stripslashes($cena);
//$nazov = mysql_real_escape_string($nazov);
//$popis = mysql_real_escape_string($popis);
//$cena = mysql_real_escape_string($cena);

//kontrola ci zadane username pri registracii uz nebolo pouzite
$sql = "UPDATE pages SET title = '$title', content = '$description' WHERE ID = $id";
$result = mysqli_query($db,$sql) or die("unable to edit");

header('Location: ../index.php#pages/test.php');


?>


