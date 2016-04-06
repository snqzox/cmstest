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

  
  $title_set = isset($_POST['title2']) ? $_POST['title2'] : '';
  $subtitle_set = isset($_POST['subtitle2']) ? $_POST['subtitle2'] : '';
  $content_set = isset($_POST['content2']) ? $_POST['content2'] : '';
  $dataid_set = isset($_POST['btnid2']) ? $_POST['btnid2'] : '';
  $email_set = isset($_POST['email2']) ? $_POST['email2'] : '';
  $mobile_set = isset($_POST['mobile2']) ? $_POST['mobile2'] : '';
  $company_set = isset($_POST['company2']) ? $_POST['company2'] : '';
  $addres_set = isset($_POST['addres2']) ? $_POST['addres2'] : '';
  $psc_set = isset($_POST['psc2']) ? $_POST['psc2'] : '';
  $ic_set = isset($_POST['ic2']) ? $_POST['ic2'] : '';
  $dic_set = isset($_POST['dic2']) ? $_POST['dic2'] : '';
  $service_set = isset($_POST['service2']) ? $_POST['service2'] : '';
  $service_ref_set = isset($_POST['service_ref']) ? $_POST['service_ref'] : ''; 



	$title=test_input($title_set);
	$subtitle=test_input($subtitle_set);
	$content=test_input($content_set);
  $dataid =test_input($dataid_set);
  $email=test_input($email_set);
  $mobile=test_input($mobile_set);
  $company=test_input($company_set);
  $addres=test_input($addres_set);
  $psc=test_input($psc_set);
  $ic=test_input($ic_set);
  $dic=test_input($dic_set);
  $service=test_input($service_set);
  $service_ref=test_input($service_ref_set);


echo  $service;



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
    case "service":
        $sql = "UPDATE services SET title = '$title', subtitle = '$subtitle', content = '$content' WHERE ID = $service";
        break;
    case "refrence":
        $sql = "UPDATE refrences SET title = '$title', content = '$content', service = '$service_ref' WHERE ID = $service";
        break;
  }

//add codition based on sent data-id attribute from getData.js file
$result = mysqli_query($resultdb,$sql) or die("Unable to update page ABOUT");
mysqli_close($resultdb);

/*header('Location: '); 
exit();*/

?>


