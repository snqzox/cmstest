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
<div id="content" style="    padding: 0;">
	<div class="login-logo"></div>
	<form style="margin: 0 auto; padding: 0 0 20px; max-width: 450px;" class="form-basic" action="scripts/authenticate.php" method="POST">
	<div class="form-group">
		<label>Meno:</label>
		<input type="text" style="width:100%;" class="form-ctrl" name="login">
	</div>
	<div class="form-group">
		<label>Heslo:</label>
		<input type="password" style="width:100%;" class="form-ctrl" name="password">
	</div>
	<button type="submit" class="btn btn-submit">Login</button>
	</form>

 <?php 
 if(!empty($_SESSION['error'])) { echo $_SESSION['error']; }
	unset($_SESSION['error']);
 ?>
</div>
 </div>


</body>
</html>