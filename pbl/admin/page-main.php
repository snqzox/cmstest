<?php 

require('scripts/config.php'); 

if (isset($_POST['submit'])){

	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   //$data = htmlspecialchars($data);
	   $data = str_replace(array("\r","\n"),"",$data);
	   return $data;
	}
	  $title_set = isset($_POST['title']) ? $_POST['title'] : 'undefined';
	  $subtitle_set = isset($_POST['subtitle']) ? $_POST['subtitle'] : 'undefined';
	 
	  $title=test_input($title_set);
	  $subtitle=test_input($subtitle_set);

		$sql_update = "UPDATE pagemain SET title='$title', subtitle='$subtitle' WHERE ID=5";
		$result_update = mysqli_query($resultdb,$sql_update) or die ("Unable to LOAD data!");
		echo 'TITULOOOOOOOOOOOOOOK____________'. $title;
		header('Location: http://localhost/cmstest/pbl/admin/page-main.php');
}else {

		$sql = "SELECT * from pagemain";
		$result = mysqli_query($resultdb,$sql) or die ("Unable to LOAD data!");

		while ($row = mysqli_fetch_array($result)) {
			$title=$row['title'];
			$subtitle=$row['subtitle'];
		}		
}



 ?>
<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Úvod</h1>
	<form method="POST" action="">
		<div class="form-basic" id="form">
			<div class="form-group">
				<label>Titulek:</label>
				<input type="text" class="form-ctrl title" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
			</div>
			<div class="form-group">
				<label>Podtitulek:</label>
				<input type="text" class="form-ctrl subtitle" name="subtitle" <?php echo 'value="'.$subtitle.'"'; ?> id="subtitle">
			</div>
			<button class="btn btn-submit" id="btn" name="submit" data-id="about">Save</button>
		  </div>
	  </form>
</div>
</body>
</html>