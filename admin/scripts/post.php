<?php

include 'connection.php';

$title=$_POST['title'];
$description=$_POST['description'];

//MySQL injection

//$nazov = stripslashes($nazov);
//$popis = stripslashes($popis);
//$cena = stripslashes($cena);

//$nazov = mysql_real_escape_string($nazov);
//$popis = mysql_real_escape_string($popis);
//$cena = mysql_real_escape_string($cena);

$sql="INSERT INTO pages (title,content)values('$title','$description')";
$result=mysqli_query($db,$sql) or die("unable to register");
	
header('Location: ../index.php');
?>


