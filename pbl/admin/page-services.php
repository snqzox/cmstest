<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Služby</h1>
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
	<h2>Sluzby a podsluzby</h2>
	<table>
		<tr>
			<th>Název služby</th>
			<th>Akce</th>
		</tr>
		<tr class="parent">
			<td>Grante a dotace</td>
			<td><a href="http://localhost/cmstest/pbl/admin/service-detail.php">Upravit</a></td>
		</tr>
		<tr class="child">
			<td>Subservice</td>
			<td><a href="http://localhost/cmstest/pbl/admin/service-detail.php">Upravit</a></td>
		</tr>
		<tr class="child">
			<td>Subservice</td>
			<td><a href="http://localhost/cmstest/pbl/admin/service-detail.php">Upravit</a></td>
		</tr>
		<tr class="child">
			<td>Subservice</td>
			<td><a href="http://localhost/cmstest/pbl/admin/service-detail.php">Upravit</a></td>
		</tr>
		<tr class="parent">
			<td>Projekční ateliér</td>
			<td><a href="http://localhost/cmstest/pbl/admin/service-detail.php">Upravit</a></td>
		</tr>
		<tr class="parent">
			<td>Realitni cinnost</td>
			<td><a href="http://localhost/cmstest/pbl/admin/service-detail.php">Upravit</a></td>
		</tr>
		<tr class="parent">
			<td>Nakladni autodoprava</td>
			<td><a href="http://localhost/cmstest/pbl/admin/service-detail.php">Upravit</a></td>
		</tr>

</div>
</body>
</html>