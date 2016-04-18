<?php 

//require('scripts/config.php'); 
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($_POST['subservice'])){

	require_once('scripts/datahandler.php');
	
	$name="article";
	$action="create";
	data_handler($name,$action,$id); 

}
	else {
		
	}


?>

<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Upravit/pridat clanok k podsluzbe 1,2 alebo 3?</h1>
	<form method="POST" action="">
		<div class="form-basic" >
			<div class="form-group">
				<label>Titulek:</label>
				<input type="text" class="form-ctrl" name="title" id="title">
			</div>
			<div class="form-group">
				<label>Obsah:</label>
				<input type="text" class="form-ctrl" name="content" id="title">
			</div>
			<!-- <div class="form-group">
				<label>Attachment:</label>
				<input type="file" name="fileToUpload" id="fileToUpload">
			</div> -->
			<button class="btn btn-submit" id="btn" data-id="about" name="subservice" <?php echo 'value="'.$id .'"'; ?> >Save</button>
		  </div>
	  </form>

</div>
</body>
</html>