<?php 

require_once('admin/scripts/config.php'); 

$res = connect();
$sqlMenu = "SELECT * from services";
$resultMenu = mysqli_query($res,$sqlMenu) or die ("Unable to load page about!");

$index=5;

while ($row = mysqli_fetch_array($resultMenu)) {

	$titleService[$index]=$row['title'];
	$index++;

	if ($index > 11){
		break;
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>PBL Migliori Futuro</title>	
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300|Roboto:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/reset.min.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="top-stripe">
	<div class="wrapper">
		<a href="index.php"><div id="logo">
		</div></a>
		<div class="menu-expander"></div>
		<div id="menu">

		<ul>
			<li><a href="index.php#uvod">Úvod</a></li>
			<li><a href="index.php#o-nas">O nás</a></li>
			<li class="submenu">
				<a href="index.php#sluzby">Služby</a>
				<ul>
					<li><a href="granty-a-dotace.php"><?php echo $titleService[5]; ?></a>
						<ul>
							<li><a href="granty-a-dotace-OPZP.php"><?php echo $titleService[6]; ?></a></li><li>
							<a href="granty-a-dotace-OPPIK.php"><?php echo $titleService[7]; ?></a></li>
						</ul>
					</li><li>
					<a href="realitni-cinnost.php"><?php echo $titleService[8];?></a></li><li>
					<a href="projekcni-atelier.php"><?php echo $titleService[9];?></a></li><li>
					<a href="nakladni-autodoprava.php"><?php echo $titleService[10];?></a></li>
				</ul>
			</li>
			<li><a href="index.php#reference">Reference</a></li>
			<li><a href="index.php#kontakt">Kontakt</a></li>
		</ul>
		</div>
	</div>
</div>