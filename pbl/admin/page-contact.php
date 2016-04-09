<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Kontakt</h1>
	<div class="form-basic" id="form">
		<div class="form-group">
			<label>E-mail:</label>
			<input type="text" class="form-ctrl title" value="'.$email.'" name="id" id="email">
		</div>
		<div class="form-group">
			<label>Mobil:</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$mobile.'" id="mobile">
		</div>
		<div class="form-group">
			<label>Název Splečnosti:</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$company.'" id="company">
		</div>
		<div class="form-group">
			<label>Adresa:</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$addres.'" id="addres">
		</div>
		<div class="form-group">
			<label>PSČ a Město::</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$psc.'" id="psc">
		</div>
		<div class="form-group">
			<label>IČ:</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$ic.'" id="ic">
		</div>
		<div class="form-group">
			<label>DIČ:</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$dic.'" id="dic">
		</div>
		<button class="btn btn-submit" id="btn" data-id="contact">Uložit</button>
	</div>

</div>
</body>
</html>