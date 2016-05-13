<?php
require_once('scripts/datahandler.php');
if (isset($_POST['submit'])){
	
	$_SESSION['saved'] = $datasaved;
	$name="page_main";
	$action="update";
	data_handler($name,$action,'',''); 
    exit();  

}
	else {
		require_once('scripts/config.php'); 

		$res = connect();
		$sql = "SELECT * from pageMain";
		$result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
		$checkedResult = checkResult($result);
		
		while ($row = mysqli_fetch_array($checkedResult)) {
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
	<p class="perex">
	Hlavný titulek a podtitulek na úvodnej stránke.
	</p>
	<?php
		if(!empty($_SESSION['saved'])) { echo $_SESSION['saved']; }
		$_SESSION['saved']='';
	 ?>
	<form method="POST" action="">
		<div class="form-basic">
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
<?php 

//removesession();

?>
