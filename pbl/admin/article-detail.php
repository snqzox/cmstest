<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Upravit/pridat clanok k podsluzbe 1,2 alebo 3?</h1>
	<div class="form-basic" id="form">
		<div class="form-group">
			<label>Titulek:</label>
			<input type="text" class="form-ctrl" value="'.$title.'" name="id" id="title">
		</div>
		<div class="form-group">
			<label>Attachment:</label>
			<input type="file" name="fileToUpload" id="fileToUpload">
		</div>
		<div class="form-group">
			<label>Attachment:</label>
			<input type="file" name="fileToUpload" id="fileToUpload">
		</div>
		<div class="form-group">
			<label>Attachment:</label>
			<input type="file" name="fileToUpload" id="fileToUpload">
		</div>
		<div class="form-group">
			<label>Attachment:</label>
			<input type="file" name="fileToUpload" id="fileToUpload">
		</div>
		<button class="btn btn-submit" id="btn" data-id="about">Save</button>
	  </div>

</div>
</body>
</html>