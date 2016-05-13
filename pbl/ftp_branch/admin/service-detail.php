<?php 
if (isset($_POST['submit'])){

	require_once('scripts/datahandler.php');

	$_SESSION['saved'] = $datasaved;
	$name="service";
	$action="update";
	data_handler($name,$action,'',''); 
	exit;
}
	else {
		
		require_once('scripts/datahandler.php');
		
		$name="service";
		$action="select";
        $edit = isset($_GET['edit']) ? $_GET['edit'] : '';

		$result_select = data_handler($name,$action,$edit,''); 
		$checkedResult = checkResult($result_select);


		while($row = mysqli_fetch_array($checkedResult)){ 

            $id = $row['ID'];   
            $title = $row['title']; 
            $subtitle=$row['subtitle'];
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

	<h1>Upravit sluzbu/podsluzbu</h1>
	<?php
		if(!empty($_SESSION['saved'])) { echo $_SESSION['saved']; }
		$_SESSION['saved']='';
	 ?>
	<form method="POST" action="">
	<div class="form-basic" >
		<div class="form-group">
			<label>Titulek:</label>
			<input type="text" class="form-ctrl title" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
			<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> >
		</div>
		<div class="form-group">
			<label>Podtitulek:</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" <?php echo 'value="'.$subtitle.'"'; ?> id="subtitle">
		</div>
		<div class="form-group">
			<label>Obsah:</label>
			<textarea class="form-ctrl" id="trumbowyg-demo" rows="15" name="content" ><?php echo $content; ?></textarea>
		</div>
		<button class="btn btn-submit" id="btn" data-id="about" name="submit">Save</button>
	  </div>
	 </form>
</div>
</body>
</html>