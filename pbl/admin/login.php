<?php
ini_set('session.save_path', '../tmp');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,700,400,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/trumbowyg.css">
	<meta charset="UTF-8">
	<title>Admin</title>
	
</head>
<body>
	<h1 style="padding:20px; border-bottom:1px solid #ddd;">Login</h1>
	<form style="margin:20px;" class="form-basic" action="scripts/authenticate.php" method="POST">
	<div class="form-group">
		<label>Meno:</label>
		<input type="text" class="form-ctrl" name="login">
	</div>
	<div class="form-group">
		<label>Heslo:</label>
		<input type="password" class="form-ctrl" name="password">
	</div>
	<button type="submit" class="btn btn-submit">Login</button>
	</form>

 <?php 
 if(!empty($_SESSION['error'])) { echo $_SESSION['error']; }
	unset($_SESSION['error']);
 ?>

 </div>


</body>
</html>