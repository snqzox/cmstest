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



	$title=test_input($_POST['title2']);
	$subtitle=test_input($_POST['subtitle2']);
	$content=test_input($_POST['content2']);
  $dataid =test_input($_POST['btnid2']);
  $email=test_input($_POST['email2']);
  $mobile=test_input($_POST['mobile2']);
  $company=test_input($_POST['company2']);
  $addres=test_input($_POST['addres2']);
  $psc=test_input($_POST['psc2']);
  $ic=test_input($_POST['ic2']);
  $dic=test_input($_POST['dic2']);



echo $dataid;

switch ($dataid) {
    case "main":
        $sql = "UPDATE main SET title = '$title', subtitle = '$subtitle' WHERE ID = 5";
        break;
    case "about":
          $sql = "UPDATE about SET title = '$title', subtitle = '$subtitle', content = '$content' WHERE ID = 5";
        break;
    case "contact":
          $sql = "UPDATE contact SET email = '$email', mobile = '$mobile', company = '$company', addres = '$addres', psc_city = '$psc', ic = '$ic', dic = '$dic' WHERE ID = 5";
        break;
  }



//add codition based on sent data-id attribute from getData.js file
$result = mysqli_query($resultdb,$sql) or die("Unable to update page ABOUT");

/*header('Location: '.$_SERVER['REQUEST_URI']);
exit();
*/
?>


