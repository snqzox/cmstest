<?php 
if (isset($_POST['submit'])){

	require_once('scripts/datahandler.php');
	
	$total = count($_FILES['files']['name']);

	$name="article";
	$action="update";
	data_handler($name,$action,''); 

}
	else {
		
		require_once('scripts/datahandler.php');
		
		$name="article";
		$action="select";
        $edit = isset($_GET['edit']) ? $_GET['edit'] : '';

		$result_select = data_handler($name,$action,$edit); 

		while($row = mysqli_fetch_array($result_select)){ 

            $id = $row['ID'];   
            $title = $row['title']; 
            $content = $row['content'];      
              
	    }
	}
?>

<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Upravit/pridat clanok k podsluzbe 1,2 alebo 3?</h1>
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="form-basic" id="form">
			<div class="form-group">
				<label>Titulek:</label>
				<input type="text" class="form-ctrl" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
				<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> >
			</div>
			<div class="form-group">
				<label>Obsah:</label>
				<input type="text" class="form-ctrl" <?php echo 'value="'.$content .'"'; ?> name="content" id="title">
			</div>
			<div class="form-group">
				<label>Attachment:</label>
				<input type="file" name="files[]" id="fileToUpload" multiple=""/>
			</div>
			<button class="btn btn-submit" id="btn" data-id="about" name="submit" >Save</button>
		  </div>
	  </form>

</div>
</body>
</html>