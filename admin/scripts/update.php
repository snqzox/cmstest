<?php

/*include_once $_SERVER['DOCUMENT_ROOT'].'/admin/scripts/connect.php';*/
 
	$user = 'root';
    $pass = '';
 	$db = 'cms';
    $host = 'localhost';

   //creating connection do db
   	$resultdb = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   //$data = htmlspecialchars($data);
   $data = str_replace(array("\r","\n"),"",$data);
   return $data;
}

if($_POST["title2"]){

	$title=test_input($_POST['title2']);
	$subtitle=test_input($_POST['subtitle2']);
	$content=test_input($_POST['content2']);

}
else {
	die("Can not store values");
}
//add codition based on sent data-id attribute from getData.js file
$sql = "UPDATE about SET title = '$title', subtitle = '$subtitle', content = '$content' WHERE ID = 5";
$result = mysqli_query($resultdb,$sql) or die("Unable to update page ABOUT");

?>


