<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Reference</h1>
	<div class="form-basic" id="form">
		<div class="form-group">
			<label>Titulek:</label>
			<input type="text" class="form-ctrl title" value="'.$title.'" name="id" id="title">
		</div>
		<div class="form-group">
			<label>Podtitulek:</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$subtitle.'" id="subtitle">
		</div>
		<button class="btn btn-submit" id="btn" data-id="about">Save</button>
	  </div>
	  <section>
		<h2>Reference k podsluzbe 1</h2>
		<table>
			<tr>
				<th>Title</th>
				<th>Actions</th>
			</tr>
			<tr>
				<td>reff title 1</td>
				<td><a href="http://localhost/cmstest/pbl/admin/reference-detail-1.php">Upravit</a>, <a href="#">Odstranit</a></td>
			</tr>
		</table>
		<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/reference-detail-1.php">Add new</a>
	</section>
	<section>
		<h2>Reference k podsluzbe 2</h2>
		<table>
			<tr>
				<th>Title</th>
				<th>Actions</th>
			</tr>
			<tr>
				<td>ref title 1</td>
				<td><a href="http://localhost/cmstest/pbl/admin/reference-detail-2.php">Upravit</a>, <a href="#">Odstranit</a></td>
			</tr>
		</table>
		<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/reference-detail-2.php">Add new</a>
	</section>
	<section>
		<h2>SReference k podsluzbe 3</h2>
		<table>
			<tr>
				<th>Title</th>
				<th>Actions</th>
			</tr>
			<tr>
				<td>ref title 1</td>
				<td><a href="http://localhost/cmstest/pbl/admin/reference-detail-3.php">Upravit</a>, <a href="#">Odstranit</a></td>
			</tr>
		</table>
		<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/reference-detail-3.php">Add new</a>
	</section>
	<section>
		<h2>SReference k podsluzbe 4</h2>
		<table>
			<tr>
				<th>Title</th>
				<th>Actions</th>
			</tr>
			<tr>
				<td>ref title 1</td>
				<td><a href="http://localhost/cmstest/pbl/admin/reference-detail-4.php">Upravit</a>, <a href="#">Odstranit</a></td>
			</tr>
		</table>
		<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/reference-detail-4.php">Add new</a>
	</section>

</div>
</body>
</html>