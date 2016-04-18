<?php 

if (isset($_POST['submit'])){

	require_once('scripts/datahandler.php');
	
	$name="page_about";
	$action="update";
	data_handler($name,$action,''); 
}
	else {
		require_once('scripts/config.php'); 

		$res = connect();
		$sql = "SELECT * from pageabout";
		$result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");

		while ($row = mysqli_fetch_array($result)) {
			$title=$row['title'];
			$subtitle=$row['subtitle'];
			$content=$row['content'];

		}		
}
?>

<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>O nás</h1>
	<p class="perex">
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
	</p>
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
		<div class="form-group">
			<label>Obsah:</label>
			<textarea class="form-ctrl" id="trumbowyg-demo" rows="15" name="content"><?php echo $content; ?></textarea>
		</div>
		<button class="btn btn-submit" id="btn" data-id="about" name="submit">Save</button>
	  </div>
	  </form>

</div>
</body>
</html>