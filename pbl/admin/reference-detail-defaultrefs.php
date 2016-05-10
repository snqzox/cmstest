<?php 
require_once('scripts/datahandler.php');
//require('scripts/config.php'); 
$add = isset($_GET['add']) ? $_GET['add'] : '';
$id = isset($_GET['edit']) ? $_GET['edit'] : '';

$name="defaultrefs";

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
			$subtitle='';
			$content='';

		
		} else {

			$action="select";
			$result_select = data_handler($name,$action,$id); 
			$checkedResult = checkResult($result_select);
						
			while($row = mysqli_fetch_array($checkedResult)){ 
	            
	            $id = $row['ID']; 
	            $title = $row['title']; 
	            $subtitle = $row['subtitle']; 
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

	<h1>upravit/pridat obecnou referenciu</h1>

	<form method="POST" action="">
		<div class="form-basic">
			<div class="form-group">
				<label>Titulek:</label>
				<input type="text" class="form-ctrl title" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
				<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> >
			</div>
			<div class="form-group">
				<label>textove pole:</label>
				<input type="text" class="form-ctrl" name="subtitle" <?php echo 'value="'.$subtitle.'"'; ?> id="subtitle">
			</div>
			<div class="form-group">
				<label>textove pole:</label>
				<input type="text" class="form-ctrl" name="content" <?php echo 'value="'.$content.'"'; ?> id="content">
			</div>
			<button class="btn btn-submit" id="btn" data-id="about" name="submit">Save</button>
		  </div>
	</form>

</div>
</body>
</html>