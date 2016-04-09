<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>O nás</h1>
	<div class="form-basic" id="form">
		<div class="form-group">
			<label>Titulek:</label>
			<input type="text" class="form-ctrl title" value="'.$title.'" name="id" id="title">
		</div>
		<div class="form-group">
			<label>Podtitulek:</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$subtitle.'" id="subtitle">
		</div>
		<div class="form-group">
			<label>Obsah:</label>
			<textarea class="form-ctrl" id="trumbowyg-demo" rows="15"></textarea>
		</div>
		<button class="btn btn-submit" id="btn" data-id="about">Save</button>
	  </div>

</div>
</body>
</html>