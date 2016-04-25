<?php 
require_once('scripts/datahandler.php');
//require('scripts/config.php'); 
$add = isset($_GET['add']) ? $_GET['add'] : '';
$id = isset($_GET['edit']) ? $_GET['edit'] : '';

$name="subsidies";

if (isset($_POST['submit'])){
	
	
	if ($add != ''){

	$action="create";
	data_handler($name,$action,'',''); 
	die('FUCK OFFF');
	} else {

	$action="update";
	data_handler($name,$action,'',''); 
	}
}
	else {
		if ($add != ''){

			$title='';
			$subject='';
			$client='';
			$price='';
			$content='';

		
		} else {

			$action="select";
			$result_select = data_handler($name,$action,$id,''); 
			
			while($row = mysqli_fetch_array($result_select)){ 
	            
	            $id = $row['ID']; 
	            $title = $row['title']; 
	            $subject = $row['subject']; 
	            $client = $row['client']; 
				$price = $row['price']; 
				$content = $row['content']; 

            }
	}
	}


?>

<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Dotace</h1>
	
	<form method="POST" action="">
	   <div class="form-basic" id="form">
		<div class="form-group">
			<label>Titulek:</label>
			<input type="text" class="form-ctrl title" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
			<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> >
		</div>
		<div class="form-group">
			<label>Predmet Dotace:</label>
			<input type="text" class="form-ctrl" name="subject" <?php echo 'value="'.$subject.'"'; ?> id="subject">
		</div>
		<div class="form-group">
			<label>Klient:</label>
			<input type="text" class="form-ctrl" name="client" <?php echo 'value="'.$client.'"'; ?> id="client">
		</div>
		<div class="form-group">
			<label>Cena:</label>
			<input type="text" class="form-ctrl" name="price" <?php echo 'value="'.$price.'"'; ?> id="price">
		</div>
		<div class="form-group">
			<label>Obsah:</label>
			<input type="text" class="form-ctrl" name="content" <?php echo 'value="'.$content.'"'; ?> id="content">
		</div>
		<button class="btn btn-submit" id="btn" data-id="about" name="submit">Save</button>
	  </div>
	</form>

</div>
</body>
</html>