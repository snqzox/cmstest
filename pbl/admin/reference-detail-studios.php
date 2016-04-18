<?php 
require_once('scripts/datahandler.php');
//require('scripts/config.php'); 
$add = isset($_GET['add']) ? $_GET['add'] : '';
$id = isset($_GET['edit']) ? $_GET['edit'] : '';

$name="studios";

if (isset($_POST['submit'])){
	
	
	if ($add != ''){

	$action="create";
	data_handler($name,$action,''); 
	} else {

	$action="update";
	data_handler($name,$action,''); 
	}
}
	else {
		if ($add != ''){

			$title='';
			$pd='';
			$client='';
			$costs='';
			$content='';

		
		} else {

			$action="select";
			$result_select = data_handler($name,$action,$id); 
			
			while($row = mysqli_fetch_array($result_select)){ 
	            
	            $id = $row['ID']; 
	            $title = $row['title']; 
	            $pd = $row['PD']; 
	            $client = $row['client']; 
				$costs = $row['costs']; 
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

	<h1>upravit/pridat referenciu k Projekční ateliér</h1>
	<div class="form-basic" id="form">

	<form method="POST" action="">
		<div class="form-group">
			<label>Titulek:</label>
			<input type="text" class="form-ctrl title" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
			<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> >
		</div>
		<div class="form-group">
			<label>Klient:</label>
			<input type="text" class="form-ctrl" name="client" <?php echo 'value="'.$client.'"'; ?> id="client">
		</div>
		<div class="form-group">
			<label>Náklady:</label>
			<input type="text" class="form-ctrl" name="costs" <?php echo 'value="'.$costs.'"'; ?> id="costs">
		</div>
		<div class="form-group">
			<label>PD:</label>
			<input type="text" class="form-ctrl" name="pd" <?php echo 'value="'.$pd.'"'; ?> id="pd">
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