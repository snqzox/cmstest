<?php

include 'connection.php';

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   //$data = htmlspecialchars($data);
   $data = str_replace(array("\r","\n"),"",$data);
   return $data;
}

if($_POST["id2"] && ($_POST["caption2"] || $_POST["description2"])){

	$id=test_input($_POST['id2']);
	$title=test_input($_POST['caption2']);
	$description=test_input($_POST['description2']);

}
else {
	die("Can not store values");
}

$sql = "UPDATE pages SET title = '$title', content = '$description' WHERE ID = $id";
$result = mysqli_query($db,$sql) or die("unable to editTTTT");

?>


