<?php

/*include_once $_SERVER['DOCUMENT_ROOT'].'/admin/scripts/connect.php';*/

	$user = 'root';
  $pass = '';
 	$db = 'cms';
  $host = 'localhost';

   //creating connection do db
  $resultdb = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");

  $id = isset($_GET['id']) ? $_GET['id'] : '';

  $sql = "DELETE FROM refrences WHERE ID = '$id'";
  
//add codition based on sent data-id attribute from getData.js file
  $result = mysqli_query($resultdb,$sql) or die("Unable to DELETE RECORD");

//header('Location: http://localhost/cmstest/admin/index.php#pages/page-reference-list.php'); 
  echo '<span>Reference" . "' . $id . '" . "byla uspesne vymazana!<span>';
  echo '<a href="pages/page-reference-list.php" class="ajax">Navrat na seznam referenci</a>';

?>
	



