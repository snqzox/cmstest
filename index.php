<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700,300,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/trumbowyg.css">
	<meta charset="UTF-8">
	<title>Administration - Main page</title>
	
</head>
<body>
	<div id="loading">Loading</div>
	<div id="right-panel">
		<div class="logo">
			CMS
		</div>	
		<ul id="menu">
			<li href="pages.html">
			 	<span>Pages</span>
			 	<ul>
				 	<li href="pages/testform.php">
				 		<span>Form Test</span>
				 	</li>
				 	<li href="pages/table.php">
				 		<span>Table test</span>
				 	</li><!-- 
				 	<li href="services.html">
				 		<span>Services</span>
				 	</li>
				 	<li href="refs.html">
				 		<span>Reference</span>
				 	</li>
				 	<li href="kontakt.html">
				 		<span>Kontakt</span>
				 	</li> -->
			 	</ul>
			</li>
			<li href="settings.html">
				<span>Settings</span>
			</li>
		</ul>
	</div>
	<div id="content">
	<h1>Welcome</h1>

	<?php include 'pages/emptyform.php';?>
	
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/trumbowyg.js"></script>
	<script type="text/javascript" src="js/cs.min.js"></script>
	<script>
		$('#trumbowyg-demo').trumbowyg({
		    fullscreenable: false,
		    closable: true,
		    semantic: false,
		    removeformatPasted: true,
		    resetCss: false,
		    autogrow: true,
		    lang: 'cs',
		    btnsAdd: ['|', 'foreColor', 'backColor'],
		    btns: ['bold', 'italic', 'underline', 'formatting', '|','justifyLeft', 'justifyCenter', 'justifyRight','|', 'link', 'insertImage','|','viewHTML']
		});
	</script>
</body>
</html>