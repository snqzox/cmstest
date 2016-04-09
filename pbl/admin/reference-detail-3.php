<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>upravit/pridat referenciu k sluzbe 3</h1>
	<div class="form-basic" id="form">
		<div class="form-group">
			<label>Titulek:</label>
			<input type="text" class="form-ctrl title" value="'.$title.'" name="id" id="title">
		</div>
		<div class="form-group">
			<label>textove pole:</label>
			<input type="text" class="form-ctrl" name="subtitle" value="'.$subtitle.'" id="subtitle">
		</div>
		<div class="form-group">
			<label>textove pole:</label>
			<input type="text" class="form-ctrl" name="subtitle" value="'.$subtitle.'" id="subtitle">
		</div>
		<div class="form-group">
			<label>textove pole:</label>
			<input type="text" class="form-ctrl" name="subtitle" value="'.$subtitle.'" id="subtitle">
		</div>
		<button class="btn btn-submit" id="btn" data-id="about">Save</button>
	  </div>

</div>
</body>
</html>