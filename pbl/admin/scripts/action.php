<?php
require_once('config.php'); 
$result = connect();

$title_set = isset($_POST['title']) ? $_POST['title'] : '';
$content_set = isset($_POST['content']) ? $_POST['content'] : '';
$subservice_id_set = isset($_POST['subservice']) ? $_POST['subservice'] : '';

$title=test_input($title_set);
$content=test_input($content_set);
$subservice_id=test_input($subservice_id_set);
$sql = "INSERT INTO articles (title, content, subservice_id) VALUES ('$title', '$content', '$subservice_id')";  
$result = mysqli_query($result,$sql) or die("Unable to create record");
header('Location: http://localhost/cmstest/pbl/admin/page-articles.php'); 
?>