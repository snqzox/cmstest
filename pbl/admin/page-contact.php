<?php 

if (isset($_POST['submit'])){

	require_once('scripts/datahandler.php');
	
	$name="contact";
	$action="update";
	data_handler($name,$action,''); 
}
	else {
		require_once('scripts/config.php'); 

		$res = connect();
		$sql = "SELECT * from contact";
		$result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");

		while ($row = mysqli_fetch_array($result)) {
			$email=$row['email'];
			$mobile=$row['mobile'];
			$company=$row['company'];
			$address=$row['address'];
			$psc_city=$row['psc_city'];
			$ic=$row['ic'];
			$dic=$row['dic'];

		}		
}
?>

<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Kontakt</h1>
	<form method="POST" action="">
		<div class="form-basic" id="form">
			<div class="form-group">
				<label>E-mail:</label>
				<input type="text" class="form-ctrl title" <?php echo 'value="'.$email.'"'; ?> name="email" id="email">
			</div>
			<div class="form-group">
				<label>Mobil:</label>
				<input type="text" class="form-ctrl subtitle" name="mobile" <?php echo 'value="'.$mobile.'"'; ?> id="mobile">
			</div>
			<div class="form-group">
				<label>Název Splečnosti:</label>
				<input type="text" class="form-ctrl subtitle" name="company" <?php echo 'value="'.$company.'"'; ?> id="company">
			</div>
			<div class="form-group">
				<label>Adresa:</label>
				<input type="text" class="form-ctrl subtitle" name="address" <?php echo 'value="'.$address.'"'; ?> id="addres">
			</div>
			<div class="form-group">
				<label>PSČ a Město::</label>
				<input type="text" class="form-ctrl subtitle" name="psc_city" <?php echo 'value="'.$psc_city.'"'; ?> id="psc">
			</div>
			<div class="form-group">
				<label>IČ:</label>
				<input type="text" class="form-ctrl subtitle" name="ic" <?php echo 'value="'.$ic.'"'; ?> id="ic">
			</div>
			<div class="form-group">
				<label>DIČ:</label>
				<input type="text" class="form-ctrl subtitle" name="dic" <?php echo 'value="'.$dic.'"'; ?> id="dic">
			</div>
			<button class="btn btn-submit" id="btn" data-id="contact" name="submit">Uložit</button>
		</div>
	</form>
</div>
</body>
</html>